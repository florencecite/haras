<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ServiceRepository;
class ServiceController extends AbstractController
{
    /**
     * @Route("/service", name="app_service")
     */
    public function index(ServiceRepository $serviceRepository): Response
    {
        return $this->render('service/index.html.twig', [   
        'controller_name' => 'ServiceController',
        'services' => $serviceRepository->findAll(),
        ]);
    }
}
