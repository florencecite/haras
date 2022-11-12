<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    /**
     * @Route("/red-forum", name="app_forum")
     */
    public function forum(): Response
    {
        // return $this->redirectToRoute('workingforum_forum');
        return $this->render('message/forum.html.twig', [
            'controller_name' => 'MessageController',
        ]);
    }
    /**
     * @Route("/red-covoit", name="app_covoit")
     */
    public function covoiturage(): Response
    {
        //return $this->redirectToRoute('workingforum_subforum', ['forum' =>'proprietaires','subforum' =>'co-voiturage']);
        
        return $this->render('message/covoit.html.twig', [
            'controller_name' => 'MessageController',
        ]);
    }
}
