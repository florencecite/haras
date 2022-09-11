<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// FT: importer le repo
use App\Repository\ReglementRepository;

class ReglementController extends AbstractController
{
    /**
     * @Route("/reglement", name="app_reglement")
     */
    // FT: passer le repo
    public function index(ReglementRepository $reglementRepository): Response
    {
        return $this->render('reglement/index.html.twig', [
            'controller_name' => 'ReglementController',
            // FT: ajouter la liste des reglements
            'reglements' => $reglementRepository->findAll(),
        ]);
    }

}
