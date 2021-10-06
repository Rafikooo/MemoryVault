<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    #[Route('/login',
        name: "app_login",
        methods: ['POST']
    )]
    public function login(Request $request): JsonResponse
    {
        return $this->json(null, 204);
    }
}
