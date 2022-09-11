<?php

namespace App\DataFixtures;


use App\Entity\Message;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class MessageFixtures extends Fixture
// ====================================================== //
// ===================== PROPRIETES ===================== //
// ====================================================== //


// ====================================================== //
// =================== METHODES====== =================== //
// ====================================================== //

{
    public function load(ObjectManager $manager): void
    {
        $message = new Message();
        $message->setDescriptif("Lorem ipsum de message");
        $manager->persist($message);

        $manager->flush();
    }
}
