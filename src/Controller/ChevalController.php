<?php

namespace App\Controller;

use App\Repository\ChevalRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChevalController extends AbstractController
{
    /**
     * @Route("/cheval", name="app_cheval")
     */
    

 // FT: passer le repo
public function index(ChevalRepository $ChevalRepository): Response
{
    return $this->render('cheval/index.html.twig', [
        'controller_name' => 'ChevalController',
         // FT: ajouter la liste des reglements
        'chevaux' => $ChevalRepository->findAll(),
    ]);
}

}

