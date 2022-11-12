<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\User1Type;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/front/user')]
class FrontUserController extends AbstractController
{
    /**
     * @Route("/proprietaires", name="app_proprietaire_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('proprietaire/index.html.twig', [
            'proprietaires' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/proprietaire/{id}", name="app_proprietaire_show", methods={"GET"})
     */
    public function show(User $user): Response
    {
        return $this->render('proprietaire/show.html.twig', [
            'user' => $user,
        ]);
    }
}
