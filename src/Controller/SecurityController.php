<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{
    #[Route('/login',
        name: "app_login",
        methods: ['post']
    )]
    public function login(): \Symfony\Component\HttpFoundation\JsonResponse
    {
        // TODO - Force application/json header

        return $this->json($this->getUser()->getUserIdentifier());
    }
}
