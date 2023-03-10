<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecipesController extends AbstractController
{
    #[Route('/recipes/0', name: 'recipes.show')]
    public function index(): Response
    {
        return $this->render('recipes/show.html.twig', [
            'controller_name' => 'RecipesController',
        ]);
    }
}
