<?php

namespace App\Controller;

use App\Entity\Ballade;
use App\Repository\BalladeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BalladeController extends AbstractController
{
    /**
     * @Route("/ballade", name="app_ballade")
     */
    public function index(BalladeRepository $balladeRepository): Response
    {
        return $this->render('ballade/index.html.twig', [
            'controller_name' => 'BalladeController',
            'ballades' => $balladeRepository->findAll(),
        ]);

    }

/**
     * @Route("/ballade/{id}", name="app_ballade_show")
     */

    public function show(Ballade $ballade): Response
    {
        return $this->render('ballade/show.html.twig', [
            'controller_name' => 'BalladeController',
            'ballade' => $ballade,
                ]);
    }


}
