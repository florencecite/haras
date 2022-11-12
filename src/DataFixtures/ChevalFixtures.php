<?php

namespace App\DataFixtures;

use App\Entity\Cheval;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ChevalFixtures extends Fixture  /*implements DependentFixtureInterface*/
{

// ====================================================== //
// ===================== PROPRIETES ===================== //
// ====================================================== //
public const PURSDAY = "Pursday";
public const DOMINO = "Domino";
// ====================================================== //
// ======================= METHODE ====================== //
// ====================================================== //

    public function load(ObjectManager $manager): void
    {
        $cheval = new Cheval();
        $cheval->setNom('Pursday');
        $cheval->setLieu('Pre-abri');
        $cheval->setAlimentation('Herbe');
        $cheval->setVeto('Dr Proust');
        $cheval->setImageName('C5.jpg');
        $manager->persist($cheval);
        $this->setReference(self::PURSDAY, $cheval);
        $cheval = new Cheval();
        $cheval->setNom('Domino');
        $cheval->setLieu('Troupeau');
        $cheval->setAlimentation('Foin');
        $cheval->setVeto('Dr Proust');
        $cheval->setImageName('C4.jpg');
        $manager->persist($cheval);
        $this->setReference(self::DOMINO, $cheval);
        $manager->flush();
    }
}
