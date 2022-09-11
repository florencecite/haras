<?php

namespace App\DataFixtures;

use App\Entity\EvenementSante;
use DateTime;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class EvenementSanteFixtures extends Fixture
// ====================================================== //
// ===================== PROPRIETES ===================== //
// ====================================================== //


// ====================================================== //
// =================== METHODES====== =================== //
// ====================================================== //

{
    public function load(ObjectManager $manager): void
    {
        $evenementSante = new EvenementSante();
        $evenementSante->setSoin("");
        $evenementSante->setDateEntree(new DateTime());
        $evenementSante->setDateFin(new DateTime());
        $evenementSante->setHospitalisation("");
        $manager->persist ($evenementSante);

        $manager->flush();
    }
}
