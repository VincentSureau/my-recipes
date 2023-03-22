<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsletterTestRecipeController extends AbstractController
{
    #[Route('/newsletter/test/recipe', name: 'app_newsletter_test_recipe')]
    public function index(RecipeRepository $recipeRepository): Response
    {
        $recipes = $recipeRepository->findAll();

        return $this->render('newsletter_test_recipe/index.html.twig', [
            'recipes' => $recipes,
        ]);
    }
}
