<?php

namespace App\Controller\Admin;

use App\Entity\Season;
use App\Form\SeasonType;
use App\Repository\SeasonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/season')]
class SeasonController extends AbstractController
{
    #[Route('/', name: 'app_admin_season_index', methods: ['GET'])]
    public function index(SeasonRepository $seasonRepository): Response
    {
        return $this->render('admin/season/index.html.twig', [
            'seasons' => $seasonRepository->findAll(),
            // 'title' => 'Liste des saisons'
        ]);
    }

    #[Route('/new', name: 'app_admin_season_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SeasonRepository $seasonRepository): Response
    {
        $season = new Season();
        $form = $this->createForm(SeasonType::class, $season);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $seasonRepository->save($season, true);

            return $this->redirectToRoute('app_admin_season_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/season/new.html.twig', [
            'season' => $season,
            'form' => $form,
            'title' => 'Ajouter une saison',
            'cancel_route' => 'app_admin_season_index'
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_season_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Season $season, SeasonRepository $seasonRepository): Response
    {
        $form = $this->createForm(SeasonType::class, $season);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $seasonRepository->save($season, true);

            return $this->redirectToRoute('app_admin_season_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/season/edit.html.twig', [
            'season' => $season,
            'form' => $form,
            'title' => 'Modifier la saison',
            'cancel_route' => 'app_admin_season_index'
        ]);
    }

    #[Route('/{id}', name: 'app_admin_season_delete', methods: ['POST'])]
    public function delete(Request $request, Season $season, SeasonRepository $seasonRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$season->getId(), $request->request->get('_token'))) {
            $seasonRepository->remove($season, true);
        }

        return $this->redirectToRoute('app_admin_season_index', [], Response::HTTP_SEE_OTHER);
    }
}
