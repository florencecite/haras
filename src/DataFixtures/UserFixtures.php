<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class UserFixtures extends Fixture implements FixtureGroupInterface

// ====================================================== //
// ===================== PROPRIETES ===================== //
// ====================================================== //


// ====================================================== //
// =================== METHODES====== =================== //
// ====================================================== //

{
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
        $user->setRoles(["ROLES_USER", "ROLE_ADMIN"]);
        $user->setPassword($this->encoder->hashPassword($user,"Pass"));

        $manager->persist($user);

        $manager->flush();
    } 

public static function getGroups(): array
{
        return ['groupe1'];
}
}