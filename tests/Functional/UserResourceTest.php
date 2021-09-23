<?php

declare(strict_types=1);

namespace App\Tests\Functional;

use App\Repository\UserRepository;
use App\Test\CustomApiTestCase;
use Doctrine\ORM\EntityManagerInterface;

class UserResourceTest extends CustomApiTestCase
{
    /**
     * @group truncate
     */
    public function testTruncateUsers(): void
    {
        $client = self::createClient();
        $container = $client->getContainer();
        $em = $container->get(EntityManagerInterface::class);
        $qb = $em->createQueryBuilder();

        $qb->delete('App\Entity\User')->getQuery()->execute();
        $userRepository = $container->get(UserRepository::class);
        $count = $userRepository->count([]);
        $this->assertEmpty($count);
    }

    public function testCreateUser(): void
    {
        $client = self::createClient();
        $user = $this->createUserRequest($client, 'rafik@student.pl', 'Rafikowaty', 'foo');
        $this->assertResponseStatusCodeSame(201);

        $container = self::getContainer();
        $em = $container->get(EntityManagerInterface::class);

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
