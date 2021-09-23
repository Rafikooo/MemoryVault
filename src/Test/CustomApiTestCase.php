<?php

declare(strict_types=1);

namespace App\Test;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\Client;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class CustomApiTestCase extends ApiTestCase
{
    /**
     * @return string IRI Response
     */
    protected function createUserRequest(Client $client, $email, $username, $password): string
    {
        $response = $client->request('POST', '/api/users',[
            'json' => [
                'email' => $email,
                'password' => $password,
                'username' => $username
            ]
        ]);

        return $response->toArray()['@id'];
    }

    protected function createUser(string $email, string $username, string $password): User
    {
        $user = new User();
        $user->setEmail($email);
        $user->setUsername($username);
        $encryptedPassword = $password; // TODO - Encrypt
        $user->setPassword($encryptedPassword);

        $em = $this->getEntityManager();
        $em->persist($user);
        $em->flush();

        return $user;
    }

    protected function getEntityManager(): EntityManagerInterface
    {
        return self::getContainer()->get(EntityManagerInterface::class);
    }
}