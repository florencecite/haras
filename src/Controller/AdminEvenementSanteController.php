<?php

namespace App\Controller;

use App\Entity\EvenementSante;
use App\Form\EvenementSanteType;
use App\Repository\EvenementSanteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/evenement_sante")
 */
class AdminEvenementSanteController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_evenement_sante_index", methods={"GET"})
     */
    public function index(EvenementSanteRepository $evenementSanteRepository): Response
    {
        return $this->render('admin_evenement_sante/index.html.twig', [
            'evenement_santes' => $evenementSanteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_admin_evenement_sante_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EvenementSanteRepository $evenementSanteRepository): Response
    {
        $evenementSante = new EvenementSante();
        $form = $this->createForm(EvenementSanteType::class, $evenementSante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $evenementSanteRepository->add($evenementSante, true);

            return $this->redirectToRoute('app_admin_evenement_sante_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_evenement_sante/new.html.twig', [
            'evenement_sante' => $evenementSante,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_evenement_sante_show", methods={"GET"})
     */
    public function show(EvenementSante $evenementSante): Response
    {
        return $this->render('admin_evenement_sante/show.html.twig', [
            'evenement_sante' => $evenementSante,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_evenement_sante_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, EvenementSante $evenementSante, EvenementSanteRepository $evenementSanteRepository): Response
    {
        $form = $this->createForm(EvenementSanteType::class, $evenementSante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $evenementSanteRepository->add($evenementSante, true);

            return $this->redirectToRoute('app_admin_evenement_sante_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_evenement_sante/edit.html.twig', [
            'evenement_sante' => $evenementSante,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_evenement_sante_delete", methods={"POST"})
     */
    public function delete(Request $request, EvenementSante $evenementSante, EvenementSanteRepository $evenementSanteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$evenementSante->getId(), $request->request->get('_token'))) {
            $evenementSanteRepository->remove($evenementSante, true);
        }

        return $this->redirectToRoute('app_admin_evenement_sante_index', [], Response::HTTP_SEE_OTHER);
    }
}
