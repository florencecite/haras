<?php

namespace App\Controller;

use App\Entity\Cavalier;
use App\Form\CavalierType;
use App\Repository\CavalierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/cavalier")
 */
class AdminCavalierController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_cavalier_index", methods={"GET"})
     */
    public function index(CavalierRepository $cavalierRepository): Response
    {
        return $this->render('admin_cavalier/index.html.twig', [
            'cavaliers' => $cavalierRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_admin_cavalier_new", methods={"GET", "POST"})
     */
    public function new(Request $request, CavalierRepository $cavalierRepository): Response
    {
        $cavalier = new Cavalier();
        $form = $this->createForm(CavalierType::class, $cavalier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cavalierRepository->add($cavalier, true);

            return $this->redirectToRoute('app_admin_cavalier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_cavalier/new.html.twig', [
            'cavalier' => $cavalier,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_cavalier_show", methods={"GET"})
     */
    public function show(Cavalier $cavalier): Response
    {
        return $this->render('admin_cavalier/show.html.twig', [
            'cavalier' => $cavalier,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_cavalier_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Cavalier $cavalier, CavalierRepository $cavalierRepository): Response
    {
        $form = $this->createForm(CavalierType::class, $cavalier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cavalierRepository->add($cavalier, true);

            return $this->redirectToRoute('app_admin_cavalier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_cavalier/edit.html.twig', [
            'cavalier' => $cavalier,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_cavalier_delete", methods={"POST"})
     */
    public function delete(Request $request, Cavalier $cavalier, CavalierRepository $cavalierRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cavalier->getId(), $request->request->get('_token'))) {
            $cavalierRepository->remove($cavalier, true);
        }

        return $this->redirectToRoute('app_admin_cavalier_index', [], Response::HTTP_SEE_OTHER);
    }
}
