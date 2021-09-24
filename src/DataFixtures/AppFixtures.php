<?php

namespace App\DataFixtures;

use App\Factory\LanguageFactory;
use App\Factory\FlashcardFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    /**
     * @throws \Exception
     */
    public function load(ObjectManager $manager)
    {
        LanguageFactory::createMany(5);

        FlashcardFactory::createMany(10,
        [
            'language' => LanguageFactory::random()
        ]);
    }
}
