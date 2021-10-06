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

    /**
     * @group role
     */
    public function testPostUserOnlyAsAdmin(): void
    {
        $this->testTruncateUsers();
        $client = self::createClient();
        $user = self::createUser('user@example.com', 'UsualUser', 'foo' );

        $admin = self::createAdmin('admin@example.com', 'SuperUser', 'foo' );
        $response = $this->logIn($client, 'user@example.com', 'foo');

    }
}
