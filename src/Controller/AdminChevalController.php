<?php

namespace App\Controller;

use App\Entity\Cheval;
use App\Form\ChevalType;
use App\Repository\ChevalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/cheval")
 */
class AdminChevalController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_cheval_index", methods={"GET"})
     */
    public function index(ChevalRepository $chevalRepository): Response
    {
        return $this->render('admin_cheval/index.html.twig', [
            'chevals' => $chevalRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_admin_cheval_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ChevalRepository $chevalRepository): Response
    {
        $cheval = new Cheval();
        $form = $this->createForm(ChevalType::class, $cheval);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $chevalRepository->add($cheval, true);

            return $this->redirectToRoute('app_admin_cheval_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_cheval/new.html.twig', [
            'cheval' => $cheval,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_cheval_show", methods={"GET"})
     */
    public function show(Cheval $cheval): Response
    {
        return $this->render('admin_cheval/show.html.twig', [
            'cheval' => $cheval,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_cheval_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Cheval $cheval, ChevalRepository $chevalRepository): Response
    {
        $form = $this->createForm(ChevalType::class, $cheval);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $chevalRepository->add($cheval, true);

            return $this->redirectToRoute('app_admin_cheval_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_cheval/edit.html.twig', [
            'cheval' => $cheval,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_cheval_delete", methods={"POST"})
     */
    public function delete(Request $request, Cheval $cheval, ChevalRepository $chevalRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cheval->getId(), $request->request->get('_token'))) {
            $chevalRepository->remove($cheval, true);
        }

        return $this->redirectToRoute('app_admin_cheval_index', [], Response::HTTP_SEE_OTHER);
    }
}
