<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    #[Route('/login',
        name: "app_login",
        methods: ['POST']
    )]
    public function login(): JsonResponse
    {
        // TODO - Force application/json header
        return $this->json($this->getUser()->getUserIdentifier());
    }
}
