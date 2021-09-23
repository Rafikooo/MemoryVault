<?php

declare(strict_types=1);

namespace App\Tests\Functional;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;

class UserResourceTest extends ApiTestCase
{

    public function testCreateUser(): void
    {
        $client = self::createClient();
        $client->request('POST', '/api/users',[
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'email' => 'rafikoko@api.pl',
                'password' => 'foo',
                'username' => 'Rafikooo'
            ]
        ]);
        $this->assertResponseStatusCodeSame(201);
    }

    public function testGetUserList(): void
    {
        $client = self::createClient();
        $client->request('GET', '/api/users',[
            'headers' => [
                'Content-Type' => 'application/json',
                'json' => []
            ]
        ]);
        $this->assertResponseStatusCodeSame(200);
    }
}
