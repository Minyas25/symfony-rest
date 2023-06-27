<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Repository\GenreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/genre')]
class GenreController extends AbstractController
{

    public function __construct(private GenreRepository $repo) {}


    #[Route(methods: 'GET')]
    public function all(): JsonResponse
    {
        return $this->json($this->repo->findAll());
    }

    #[Route('/{id}',methods: 'GET')]
    public function one(int $id): JsonResponse
    {
        $genre = $this->repo->findById($id);
        if($genre == null) {
            return $this->json('Resource Not found', 404);
        }

        return $this->json($genre);
    }

    #[Route('/{id}',methods: 'DELETE')]
    public function delete(int $id): JsonResponse
    {
        $genre = $this->repo->findById($id);
        if($genre == null) {
            return $this->json('Resource Not found', 404);
        }
        $this->repo->delete($id);

        return $this->json(null, 204);
    }

    #[Route(methods: 'POST')]
    public function add(Request $request, SerializerInterface $serializer) {
        // $data = $request->toArray();
        // $genre = new Genre($data['title'], $data['resume'], new \DateTime($data['released']), $data['duration']);

        $genre = $serializer->deserialize($request->getContent(), Genre::class, 'json');
        $this->repo->persist($genre);

        return $this->json($genre, 201);
    }

    #[Route('/{id}', methods: 'PATCH')]
    public function update(int $id, Request $request, SerializerInterface $serializer) {

        $genre = $this->repo->findById($id);
        if($genre == null) {
            return $this->json('Resource Not found', 404);
        }

        $serializer->deserialize($request->getContent(), Genre::class, 'json',[
            'object_to_populate' => $genre
        ]);
        $this->repo->update($genre);

        return $this->json($genre);
    }
}
