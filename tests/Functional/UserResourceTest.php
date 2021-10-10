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
     * @group post
     */
    public function testPostUser(): void
    {
        $this->testTruncateUsers();
        $client = self::createClient();
        $user = self::createUserAndLogIn($client, 'user@example.com', 'user', 'foo' );
    }

    public function testUpdateUser(): void
    {
        $this->testTruncateUsers();
        $client = self::createClient();
        $user = self::createUserAndLogIn($client, 'user@example.com', 'user', 'foo' );
        $client->request('PUT', '/api/users/' . $user->getId(), [
            'json' => [
                'username' => 'updatedNickname'
            ]
        ]);
        self::assertResponseIsSuccessful();
    }
}
