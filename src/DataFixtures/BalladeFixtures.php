<?php

namespace App\DataFixtures;

use App\Entity\Ballade;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BalladeFixtures extends Fixture

// ====================================================== //
// ===================== PROPRIETES ===================== //
// ====================================================== //


// ====================================================== //
// =================== METHODES====== =================== //
// ====================================================== //

{
    public function load(ObjectManager $manager): void
    {
        $ballade = new Ballade();
        $ballade->setNom("Bois Doré");
        $ballade->setDuree(2);
        $ballade->setDescription("Lorem Ipsum");
        $ballade->setNiveau("debutant");
        $manager->persist($ballade);

        $manager->flush();
    }
}
