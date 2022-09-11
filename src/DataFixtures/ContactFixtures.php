<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ContactFixtures extends Fixture
// ====================================================== //
// ===================== PROPRIETES ===================== //
// ====================================================== //


// ====================================================== //
// =================== METHODES====== =================== //
// ====================================================== //

{
    public function load(ObjectManager $manager): void
    {
        $contact = new Contact();
        $contact->setNom("jean");
        $contact->setPrenom("test");
        $contact->setNumeroTelephone(606778899);
        $manager->persist($contact);

        $manager->flush();
    }
}
