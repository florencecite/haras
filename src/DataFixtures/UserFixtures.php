<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture

// ====================================================== //
// ===================== PROPRIETES ===================== //
// ====================================================== //


// ====================================================== //
// =================== METHODES====== =================== //
// ====================================================== //

{
    public const FLORENCE = 'florence';
    private $encoder;

    public function __construct (UserPasswordHasherInterface $userPasswordHasherInterface)
    {
        $this->encoder = $userPasswordHasherInterface;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setNom ('Cite');
        $user->setPrenom('Florence');
        $user->setTelephone('0601010101');
        $user->setEmail('florence.cite@gmail.com');
        $user->setUserName('florence');
        $user->setRoles(["ROLES_USER", "ROLE_ADMIN"]);
        $user->setPassword($this->encoder->hashPassword($user,"Pass"));
        // $user->addCheval($this->getReference(ChevalFixtures::PURSDAY));
        $manager->persist($user);
        $this->addReference(self::FLORENCE, $user );;

        $user = new User();
        $user->setNom ('Un');
        $user->setPrenom('Marcel');
        $user->setTelephone('0601010101');
        $user->setEmail('un@gmail.com');
        $user->setUserName('un');
        $user->setRoles(["ROLES_USER"]);
        $user->setPassword($this->encoder->hashPassword($user,"Pass"));
        $manager->persist($user);




        $manager->flush();
    } 

}