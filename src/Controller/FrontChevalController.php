<?php

namespace App\Controller;

use App\Entity\Cheval;
use App\Form\ChevalFrontType;
use App\Repository\UserRepository;
use App\Repository\ChevalRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\User;
/**
 *  @Route("/user/cheval")
 */
class FrontChevalController extends AbstractController
{
    /**
     * @Route("/index", name="app_front_cheval_index", methods={"GET"})
     */
    public function index(): Response
    {
        // $person_id=$userRepository->find( $this->getUser());
        return $this->render('front_cheval/index.html.twig', [
             'chevals' => $this->getUser()->getCheval(),
            //  'person_id' => $person_id,
        ]);
    }

    /**
     * @Route("/new", name="app_front_cheval_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ChevalRepository $chevalRepository): Response
    {
        $cheval = new Cheval();
        //$u=new User();
        $cheval->setUser($this->getUser());
        $form = $this->createForm(ChevalFrontType::class, $cheval);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $chevalRepository->add($cheval, true);

            return $this->redirectToRoute('app_front_cheval_index', [ 
                'person_id' => $this->getUser(),
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('front_cheval/new.html.twig', [
            'cheval' => $cheval,
            'form' => $form,
            'user' => $this->getUser(),
        ]);
    }

    /**
     * @Route("/{id}/show", name="app_front_cheval_show", methods={"GET"})
     */
    public function show(Cheval $cheval): Response
    {
        return $this->render('front_cheval/show.html.twig', [
            'cheval' => $cheval,
            'user' => $this->getUser(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_front_cheval_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Cheval $cheval, ChevalRepository $chevalRepository): Response
    {
        $form = $this->createForm(ChevalFrontType::class, $cheval);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $chevalRepository->add($cheval, true);

            return $this->redirectToRoute('app_front_cheval_index', [
                'person_id' => $this->getUser(),
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->render('front_cheval/edit.html.twig', [
            'cheval' => $cheval,
            'form' => $form->createView(),
            'user' => $this->getUser(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_front_cheval_delete", methods={"POST"})
     */
    public function delete(Request $request, Cheval $cheval, ChevalRepository $chevalRepository): Response
    {
        $person_id=$cheval->getUser();
        if ($this->isCsrfTokenValid('delete'.$cheval->getId(), $request->request->get('_token'))) {
            $chevalRepository->remove($cheval, true);
        }

        return $this->redirectToRoute('app_front_cheval_index', [
            'cheval' => $cheval,
            'person_id' => $person_id,
        ], Response::HTTP_SEE_OTHER);
    }
}
