<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RecipesController extends AbstractController
{
    #[Route('/recipes', name: 'recipes')]
    public function index(RecipeRepository $recipeRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $pagination = $paginator->paginate(
            $recipeRepository->findAll(), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            3 /*limit per page*/
        );
        return $this->render('recipes/index.html.twig', [
            'recipes' => $pagination,
        ]);
        
    }
}
