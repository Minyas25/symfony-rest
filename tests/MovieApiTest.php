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
       
    }


    public function testGetOneSuccess(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/movie/1');
        $json = json_decode($client->getResponse()->getContent(), true);

        $this->assertResponseIsSuccessful();

        $this->assertIsString($json['title']);
        $this->assertIsString($json['resume']);
        $this->assertIsInt($json['duration']);
        $this->assertIsString($json['released']);
        $this->assertIsInt($json['id']);
       
    }
    public function testGetOneNotFound(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/movie/100');
        
        $this->assertResponseStatusCodeSame(404);

    }
    
    public function testPostSuccess(): void
    {
        $client = static::createClient();
        $client->request('POST', '/api/movie', content: json_encode([
            'title' => 'From Test',
            'resume' => 'Resume Test',
            'released' => '2020-10-01',
            'duration' => 100
        ]));
        $json = json_decode($client->getResponse()->getContent(), true);

        $this->assertResponseIsSuccessful();

        $this->assertIsInt($json['id']);
    }
}
