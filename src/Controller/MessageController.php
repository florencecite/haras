<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    /**
     * @Route("/message", name="app_forum")
     */
    public function forum(): Response
    {
        return $this->redirectToRoute('workingforum_forum');
        /*
        return $this->render('message/index.html.twig', [
            'controller_name' => 'MessageController',
        ]);*/
    }
    /**
     * @Route("/red-covoit", name="app_covoit")
     */
    public function covoiturage(): Response
    {
        return $this->redirectToRoute('workingforum_subforum', ['forum' =>'proprietaires','subforum' =>'co-voiturage']);
        /*
        return $this->render('message/index.html.twig', [
            'controller_name' => 'MessageController',
        ]);*/
    }
}
