<?php

namespace App\DataFixtures;

use App\Entity\Translation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    /**
     * @throws \Exception
     */
    public function load(ObjectManager $manager)
    {
        $translation = new Translation();
        $translation->setSource("aaa");
        // $manager->persist($product);
        $manager->persist($translation);

        $manager->flush();
    }
}
