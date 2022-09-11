<?php

namespace App\DataFixtures;

use App\Entity\Service;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ServiceFixtures extends Fixture
// ====================================================== //
// ===================== PROPRIETES ===================== //
// ====================================================== //


// ====================================================== //
// =================== METHODES====== =================== //
// ====================================================== //

{
    public function load(ObjectManager $manager): void
    {
        $service = new Service();
        $service->setType("Covoiturage");
        $service->setDescriptif("Coucou");
        $manager->persist($service);

        $manager->flush();
    }
}
