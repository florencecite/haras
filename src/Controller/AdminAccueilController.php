<?php

namespace App\Controller;

use App\Entity\Accueil;
use App\Form\AccueilType;
use App\Repository\AccueilRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/accueil")
 */
class AdminAccueilController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_accueil_index", methods={"GET"})
     */
    public function index(AccueilRepository $accueilRepository): Response
    {
        return $this->render('admin_accueil/index.html.twig', [
            'accueils' => $accueilRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_admin_accueil_new", methods={"GET", "POST"})
     */
    public function new(Request $request, AccueilRepository $accueilRepository): Response
    {
        $accueil = new Accueil();
        $form = $this->createForm(AccueilType::class, $accueil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $accueilRepository->add($accueil, true);

            return $this->redirectToRoute('app_admin_accueil_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_accueil/new.html.twig', [
            'accueil' => $accueil,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_accueil_show", methods={"GET"})
     */
    public function show(Accueil $accueil): Response
    {
        return $this->render('admin_accueil/show.html.twig', [
            'accueil' => $accueil,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_accueil_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Accueil $accueil, AccueilRepository $accueilRepository): Response
    {
        $form = $this->createForm(AccueilType::class, $accueil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $accueilRepository->add($accueil, true);

            return $this->redirectToRoute('app_admin_accueil_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_accueil/edit.html.twig', [
            'accueil' => $accueil,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_accueil_delete", methods={"POST"})
     */
    public function delete(Request $request, Accueil $accueil, AccueilRepository $accueilRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$accueil->getId(), $request->request->get('_token'))) {
            $accueilRepository->remove($accueil, true);
        }

        return $this->redirectToRoute('app_admin_accueil_index', [], Response::HTTP_SEE_OTHER);
    }
}
