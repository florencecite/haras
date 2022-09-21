<?php

namespace App\Controller;

use App\Entity\Cavalier;
use App\Form\Cavalier1Type;
use App\Repository\UserRepository;
use App\Repository\CavalierRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/front/cavalier")
 */
class FrontCavalierController extends AbstractController
{
    /**
     * @Route("/", name="app_front_cavalier_index", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('front_cavalier/index.html.twig', [
            'cavaliers' => $this->getUser()->getCavalier(),
        ]);
    }

    /**
     * @Route("/new", name="app_front_cavalier_new", methods={"GET", "POST"})
     */
    public function new(Request $request, CavalierRepository $cavalierRepository): Response
    {
        $cavalier = new Cavalier();
        $cavalier->setUser($this->getUser());
        $form = $this->createForm(Cavalier1Type::class, $cavalier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cavalierRepository->add($cavalier, true);

            return $this->redirectToRoute('app_front_cavalier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('front_cavalier/new.html.twig', [
            'cavalier' => $cavalier,
            'form' => $form,
            'person_id' => $this->getUser(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_front_cavalier_show", methods={"GET"})
     */
    public function show(Cavalier $cavalier): Response
    {
        return $this->render('front_cavalier/show.html.twig', [
            'cavalier' => $cavalier,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_front_cavalier_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Cavalier $cavalier, CavalierRepository $cavalierRepository): Response
    {
        $form = $this->createForm(Cavalier1Type::class, $cavalier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cavalierRepository->add($cavalier, true);

            return $this->redirectToRoute('app_front_cavalier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('front_cavalier/edit.html.twig', [
            'cavalier' => $cavalier,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_front_cavalier_delete", methods={"POST"})
     */
    public function delete(Request $request, Cavalier $cavalier, CavalierRepository $cavalierRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cavalier->getId(), $request->request->get('_token'))) {
            $cavalierRepository->remove($cavalier, true);
        }

        return $this->redirectToRoute('app_front_cavalier_index', [], Response::HTTP_SEE_OTHER);
    }
}
