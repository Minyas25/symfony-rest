<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MovieApiTest extends WebTestCase
{
    public function testGetAll(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/movie');
        $json = json_decode($client->getResponse()->getContent(), true);

        $this->assertResponseIsSuccessful();

        $this->assertNotEmpty($json);
        $this->assertIsString($json[0]['title']);
        $this->assertIsInt($json[0]['id']);


        //exemple de post (à dégager, c'est juste pour l'exemple)
        // $client->request('POST', '/api/movie', content: json_encode([
        //     'title' => 'Mon titre',
        // ]));
       
    }


}
