<?php

namespace App\DataFixtures;

use App\Factory\CategoryFactory;
use App\Factory\LanguageFactory;
use App\Factory\FlashcardFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    /**
     * @throws \Exception
     */
    public function load(ObjectManager $manager)
    {
        UserFactory::createMany(10);
        LanguageFactory::createMany(5);
        CategoryFactory::createOne();
        FlashcardFactory::createMany(10, function() {
            return [
                'category' => CategoryFactory::random(),
                'owner' => UserFactory::random()
            ];
        });
    }
}
