<?php

namespace App\DataFixtures;

use App\Entity\Cavalier;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CavalierFixtures extends Fixture implements DependentFixtureInterface
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
        $cavalier->setNiveau("Confirmé");
        $cavalier->setImageName("floflo.jpg");
        $cavalier->setUser($this->getReference(UserFixtures::FLORENCE));
        $manager->persist($cavalier);

        $cavalier = new Cavalier();
        $cavalier->setNom('Pothed');
        $cavalier->setPrenom('Martine');
        $cavalier->setMail("martine@martine.com");
        $cavalier->setNiveau("Confirmé");
        $cavalier->setImageName("femme2.jpg");
        $cavalier->setUser($this->getReference(UserFixtures::FLORENCE));
        $manager->persist($cavalier);

        $cavalier = new Cavalier();
        $cavalier->setNom('Gueudin');
        $cavalier->setPrenom('Daniel');
        $cavalier->setMail("daniel@daniel.com");
        $cavalier->setNiveau("Confirmé");
        $cavalier->setImageName("homme2.jpg");
        $cavalier->setUser($this->getReference(UserFixtures::UN));
        $manager->persist($cavalier);

        $cavalier = new Cavalier();
        $cavalier->setNom ('Un');
        $cavalier->setPrenom('Marcel');
        $cavalier->setMail('un@gmail.com');
        $cavalier->setNiveau("Débutant");
        $cavalier->setImageName("homme.jpg");
        $cavalier->setUser($this->getReference(UserFixtures::UN));
        $manager->persist($cavalier);

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
