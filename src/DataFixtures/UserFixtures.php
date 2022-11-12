<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Avatar;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface

// ====================================================== //
// ===================== PROPRIETES ===================== //
// ====================================================== //


// ====================================================== //
// =================== METHODES====== =================== //
// ====================================================== //

{
    public const FLORENCE = 'florence';
    public const UN = 'un';
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
        $av=new Avatar();
        $av->setImageName("floflo.jpg");
        $manager->persist($av);
        $user->setAvatar($av);
        $user->setIsVerified(true);
        $user->setPassword($this->encoder->hashPassword($user,"Pass"));
        $user->addCheval($this->getReference(ChevalFixtures::PURSDAY));
        $manager->persist($user);
        $this->addReference(self::FLORENCE, $user );;

        $user = new User();
        $user->setNom ('Un');
        $user->setPrenom('Marcel');
        $user->setTelephone('0601010101');
        $user->setEmail('un@gmail.com');
        $user->setUserName('un');
        $user->setRoles(["ROLES_USER"]);
        $av=new Avatar();
        $av->setImageName("homme.jpg");
        $manager->persist($av);
        $user->setAvatar($av);
        $user->setPassword($this->encoder->hashPassword($user,"Pass"));
        $user->addCheval($this->getReference(ChevalFixtures::DOMINO));
        $manager->persist($user);
        $this->addReference(self::UN, $user );;

        $manager->flush();
    } 
    /**
     * @return list<class-string<FixtureInterface>>
     */
    public function getDependencies(): array
    {
        return [
            ChevalFixtures::class
        ];
    }
}