<?php

namespace App\DataFixtures;

use App\Entity\Cavalier;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CavalierFixtures extends Fixture
{

// ====================================================== //
// ===================== PROPRIETES ===================== //
// ====================================================== //


// ====================================================== //
// =================== METHODES====== =================== //
// ====================================================== //

    public function load(ObjectManager $manager): void
    {
        $cavalier = new Cavalier();
        $cavalier->setNom('Cite');
        $cavalier->setPrenom('Florence');
        $cavalier->setMail("florence@florence.com");
        $cavalier->setNiveau("confirmé");
        $manager->persist($cavalier);

        $cavalier = new Cavalier();
        $cavalier->setNom('Pothed');
        $cavalier->setPrenom('Martine');
        $cavalier->setMail("martine@martine.com");
        $cavalier->setNiveau("confirmé");
        $manager->persist($cavalier);

        $cavalier = new Cavalier();
        $cavalier->setNom('Gueudin');
        $cavalier->setPrenom('Daniel');
        $cavalier->setMail("daniel@daniel.com");
        $cavalier->setNiveau("confirmé");
        $manager->persist($cavalier);



        $manager->flush();
    }
}
