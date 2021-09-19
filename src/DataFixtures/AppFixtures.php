<?php

namespace App\DataFixtures;

use App\Entity\Translation;
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
        TranslationFactory::createMany(10);
    }
}
