<?php

namespace App\DataFixtures;

use App\Entity\Reglement;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ReglementFixtures extends Fixture

// ====================================================== //
// ===================== PROPRIETES ===================== //
// ====================================================== //


// ====================================================== //
// =================== METHODES====== =================== //
// ====================================================== //
{
    public function load(ObjectManager $manager): void
    {
        $reglement = new Reglement();
        $reglement->setTexte("Lorem");
        $manager->persist($reglement);

        $manager->flush();
    }
}
