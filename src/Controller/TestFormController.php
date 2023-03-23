<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestFormController extends AbstractController
{
    #[Route('/test/form', name: 'app_test_form')]
    public function index(RecipeRepository $recipeRepository): Response
    {
        return $this->render('test_form/index.html.twig', [
            'recipes' => $recipeRepository->findAll(),
        ]);
    }
}
