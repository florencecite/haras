<?php

namespace App\Controller;
use App\Entity\User;
use App\Form\UserFrontType;
use App\Entity\Cheval;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{

    /**
     * @Route("/user", name="app_user")
     */
    public function index(UserRepository $userRepository): Response
    {
        $user = $this->getUser();
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            'user' => $user,
            ]);
    }
    
    /**
     * @Route("/{id}/edit", name="app_user_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, User $user, UserRepository $userRepository): Response
    {
        $form = $this->createForm(UserFrontType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->add($user, true);
            return $this->redirectToRoute('app_user', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }
}
