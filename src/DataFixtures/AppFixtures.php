<?php

namespace App\DataFixtures;

use App\Factory\LanguageFactory;
use App\Factory\TranslationFactory;
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

        TranslationFactory::createMany(10,
        [
            'language' => LanguageFactory::random()
        ]);
    }
}
