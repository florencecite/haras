<?php

namespace App\DataFixtures;

use App\Entity\Cheval;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ChevalFixtures extends Fixture
{

// ====================================================== //
// ===================== PROPRIETES ===================== //
// ====================================================== //
public const PURSDAY = "pursday";
// ====================================================== //
// ======================= METHODE ====================== //
// ====================================================== //

    public function load(ObjectManager $manager): void
    {
        $cheval = new Cheval();
        $cheval->setNom('Pursday');
        $cheval->setLieu('Pre-abri');
        $cheval->setAlimentation('rien');
        $cheval->setVeto('Dr Proust');
        $cheval->setUser($this->getReference(UserFixtures::FLORENCE));
        $manager->persist($cheval);
        $this->setReference(self::PURSDAY, $cheval);




        $manager->flush();
    }
}
