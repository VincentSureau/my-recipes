<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]
    public function index(): Response
    {
        return $this->render('search/recipe.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }

    public function searcRecipe(Request $request){

        $searchRecipeForm = $this->createForm(SearchRecipeType::class);
        return $this->render('search/recipe.html.twig', [
            'search_form' => $searchRecipeForm->createView(),
        ]);
    }
}
