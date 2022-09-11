<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BalladeController extends AbstractController
{
    /**
     * @Route("/ballade", name="app_ballade")
     */
    public function index(): Response
    {
        return $this->render('ballade/index.html.twig', [
            'controller_name' => 'BalladeController',
        ]);
    }
}
