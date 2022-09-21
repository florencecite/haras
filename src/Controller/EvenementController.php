<?php

namespace App\Controller;

use App\Repository\EvenementRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EvenementController extends AbstractController
{
    /**
     * @Route("/evenement", name="app_evenement")
     */
    public function index(EvenementRepository $evenementRepository): Response
    {
        $evenementInternes = $evenementRepository->findBy(['interne'=>true]);
        $evenementExternes =  $evenementRepository->findBy(['interne'=>false]);
        return $this->render('evenement/index.html.twig', [
            'controller_name' => 'EvenementController',
            // FT: ajouter la liste des evenements
            // 'evenements' => $evenementRepository->findAll(),
            "evenementInternes"=>$evenementInternes,
            "evenementExternes"=>$evenementExternes,
        ]);
    }
}
