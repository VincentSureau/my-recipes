<?php

namespace App\Controller\Admin;

use App\Entity\Newsletter;
use App\Form\NewsletterType;
use App\Repository\RecipeRepository;
use App\Repository\NewsletterRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/newsletter')]
class NewsletterController extends AbstractController
{
    #[Route('/', name: 'app_admin_newsletter_index', methods: ['GET'])]
    public function index(NewsletterRepository $newsletterRepository): Response
    {
        return $this->render('admin/newsletter/index.html.twig', [
            'newsletters' => $newsletterRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_newsletter_new', methods: ['GET', 'POST'])]
    public function new(RecipeRepository $recipeRepository, Request $request, NewsletterRepository $newsletterRepository): Response
    {
        $recipes = $recipeRepository->findAll();

        $newsletter = new Newsletter();
        $form = $this->createForm(NewsletterType::class, $newsletter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newsletterRepository->save($newsletter, true);

            return $this->redirectToRoute('app_admin_newsletter_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/newsletter/new.html.twig', [
            'newsletter' => $newsletter,
            'form' => $form,
            'recipes' => $recipes
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_newsletter_edit', methods: ['GET', 'POST'])]
    public function edit(RecipeRepository $recipeRepository, Request $request, Newsletter $newsletter, NewsletterRepository $newsletterRepository): Response
    {

        $recipes = $recipeRepository->findAll();

        $form = $this->createForm(NewsletterType::class, $newsletter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newsletterRepository->save($newsletter, true);

            return $this->redirectToRoute('app_admin_newsletter_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/newsletter/edit.html.twig', [
            'newsletter' => $newsletter,
            'form' => $form,
            'recipes' => $recipes
        ]);
    }

    #[Route('/{id}', name: 'app_admin_newsletter_delete', methods: ['POST'])]
    public function delete(Request $request, Newsletter $newsletter, NewsletterRepository $newsletterRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$newsletter->getId(), $request->request->get('_token'))) {
            $newsletterRepository->remove($newsletter, true);
        }

        return $this->redirectToRoute('app_admin_newsletter_index', [], Response::HTTP_SEE_OTHER);
    }
}
