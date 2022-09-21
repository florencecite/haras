<?php

namespace App\Controller;

use App\Entity\Cavalier;
use App\Repository\ChevalRepository;
use App\Repository\CavalierRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CavalierController extends AbstractController
{

    //$chevalName = $cavalier->getCheval()->getName();
    
/**
     * @Route("/cavalier", name="app_cavalier")
     */
    // FT: passer le repo
    public function index(CavalierRepository $cavalierRepository): Response
    {
        return $this->render('cavalier/index.html.twig', [
            'controller_name' => 'CavalierController',
            // FT: ajouter la liste des reglements
            'cavaliers' => $cavalierRepository->findAll(),
                ]);
    }
/**
     * @Route("/cavalier/{id}", name="app_cavalier_show")
     */

    public function show(Cavalier $cavalier): Response
    {
        return $this->render('cavalier/show.html.twig', [
            'controller_name' => 'CavalierController',
            'cavalier' => $cavalier,
                ]);
    }

}

