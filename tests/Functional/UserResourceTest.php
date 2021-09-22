<?php


namespace App\Tests\Functional;


use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class UserResourceTest extends ApiTestCase
{
    public function testCreateUser()
    {
        $client = self::createClient();
        $client->request('GET', '/api/users',[
            'headers' => [
                'Content-Type' => 'application/json',
                'json' => []
            ]
        ]);
        $this->assertResponseStatusCodeSame(200);

        $user = new User();
        $user->setEmail('rafikoko@api.pl');
        $user->setPassword('foo');
        $user->setUsername('Rafikooo');

        $container = self::getContainer();
        $em = $container->get(EntityManagerInterface::class);
        $em->persist($user);
        $em->flush();
    }
}
