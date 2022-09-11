<?php

namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class ImageFixtures extends Fixture

// ====================================================== //
// ===================== PROPRIETES ===================== //
// ====================================================== //


// ====================================================== //
// =================== METHODES====== =================== //
// ====================================================== //

{
    public function load(ObjectManager $manager): void
    {
        $image = new Image();
        $image->setImageName("harasdelacense1.jpg");
        $manager->persist($image);

        $manager->flush();
    }
}
