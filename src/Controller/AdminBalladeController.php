<?php

namespace App\Controller;

use App\Entity\Ballade;
use App\Form\BalladeType;
use App\Repository\BalladeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/ballade")
 */
class AdminBalladeController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_ballade_index", methods={"GET"})
     */
    public function index(BalladeRepository $balladeRepository): Response
    {
        return $this->render('admin_ballade/index.html.twig', [
            'ballades' => $balladeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_admin_ballade_new", methods={"GET", "POST"})
     */
    public function new(Request $request, BalladeRepository $balladeRepository): Response
    {
        $ballade = new Ballade();
        $form = $this->createForm(BalladeType::class, $ballade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $balladeRepository->add($ballade, true);

            return $this->redirectToRoute('app_admin_ballade_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_ballade/new.html.twig', [
            'ballade' => $ballade,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_ballade_show", methods={"GET"})
     */
    public function show(Ballade $ballade): Response
    {
        return $this->render('admin_ballade/show.html.twig', [
            'ballade' => $ballade,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_ballade_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Ballade $ballade, BalladeRepository $balladeRepository): Response
    {
        $form = $this->createForm(BalladeType::class, $ballade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $balladeRepository->add($ballade, true);

            return $this->redirectToRoute('app_admin_ballade_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_ballade/edit.html.twig', [
            'ballade' => $ballade,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_ballade_delete", methods={"POST"})
     */
    public function delete(Request $request, Ballade $ballade, BalladeRepository $balladeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ballade->getId(), $request->request->get('_token'))) {
            $balladeRepository->remove($ballade, true);
        }

        return $this->redirectToRoute('app_admin_ballade_index', [], Response::HTTP_SEE_OTHER);
    }
}
