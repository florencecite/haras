<?php

namespace App\DataFixtures;

use App\Entity\Evenement;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use \Date;
use DateTime;

class EvenementFixtures extends Fixture
// ====================================================== //
// ===================== PROPRIETES ===================== //
// ====================================================== //


// ====================================================== //
// =================== METHODES====== =================== //
// ====================================================== //

{
    public function load(ObjectManager $manager): void
    {
        $evenement = new Evenement();
        $evenement->setInterne("oui");
        $evenement->setExterne("non");
        $evenement->setTexte("Sortie plein air");
        $evenement->setDateDebut(new DateTime());
        $evenement->setDateFin(new DateTime());
        $manager->persist($evenement);

        $manager->flush();
    }
}
