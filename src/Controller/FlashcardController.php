<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class FlashcardController extends AbstractController
{
    public function listRandomFlashcards(): Response
    {
        return $this->render('flashcard/flashcard.twig',[
            'flashcards' => [
                "a", "b"
            ]
        ]);
    }
}