<?php

namespace App\DataFixtures;

use App\Entity\Accueil;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AccueilFixtures extends Fixture
{
    public function load(ObjectManager $manager): void

// ====================================================== //
// ===================== PROPRIETES ===================== //
// ====================================================== //


// ====================================================== //
// =================== METHODES====== =================== //
// ====================================================== //
    {
            $accueil = new Accueil();
            $accueil->setTitre('Les Propriétaires du Haras de la Cense');
            //$accueil->setImageName();
            $accueil->setUpdatedAt(new DateTimeImmutable());

            $manager->persist($accueil);

        $manager->flush();
    }
}
