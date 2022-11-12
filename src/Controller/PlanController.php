<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlanController extends AbstractController
{
    /**
     * @Route("/cense", name="app_cense")
     */
    public function planCense(): Response
    {
        return $this->render('plan/cense.html.twig', [
            'controller_name' => 'PlanController',
        ]);
    }
    /**
     * @Route("/foret", name="app_foret")
     */
    public function planForet(): Response
    {
        return $this->render('plan/foret.html.twig', [
            'controller_name' => 'PlanController',
        ]);
    }
}
