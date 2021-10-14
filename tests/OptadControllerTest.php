<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class OptadControllerTest extends WebTestCase
{
    public function testConnection(): void
    {
        $client = static::createClient();

        $client->request('GET', 'https://localhost:8000/optad');

        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }
}
