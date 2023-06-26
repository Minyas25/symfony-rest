<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/movie')]
class MovieController extends AbstractController
{

    public function __construct(private MovieRepository $repo) {}


    #[Route(methods: 'GET')]
    public function all(): JsonResponse
    {
        return $this->json($this->repo->findAll());
    }

    #[Route('/{id}',methods: 'GET')]
    public function one(int $id): JsonResponse
    {
        $movie = $this->repo->findById($id);
        if($movie == null) {
            return $this->json('Resource Not found', 404);
        }

        return $this->json($movie);
    }

    #[Route('/{id}',methods: 'DELETE')]
    public function delete(int $id): JsonResponse
    {
        $movie = $this->repo->findById($id);
        if($movie == null) {
            return $this->json('Resource Not found', 404);
        }
        $this->repo->delete($id);

        return $this->json(null, 204);
    }

    #[Route(methods: 'POST')]
    public function add(Request $request, SerializerInterface $serializer) {
        // $data = $request->toArray();
        // $movie = new Movie($data['title'], $data['resume'], new \DateTime($data['released']), $data['length']);

        $movie = $serializer->deserialize($request->getContent(), Movie::class, 'json');
        $this->repo->persist($movie);

        return $this->json($movie, 201);
    }

    #[Route('/{id}', methods: 'PATCH')]
    public function update(int $id, Request $request, SerializerInterface $serializer) {
        
        $movie = $this->repo->findById($id);
        if($movie == null) {
            return $this->json('Resource Not found', 404);
        }

        $serializer->deserialize($request->getContent(), Movie::class, 'json',[
            'object_to_populate' => $movie
        ]);
        $this->repo->update($movie);

        return $this->json($movie);
    }
}
