<?php

namespace App\Controller;

use App\Form\SearchRecipeType;
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
        $form = $this->createForm(SearchRecipeType::class);

        $recipes = $recipeRepository->findAll();

        if($form->handleRequest($request)->isSubmitted() && $form->isValid()){
            $criteria = $form->getData();
        }

        $pagination = $paginator->paginate(

            $recipeRepository->findByExampleField($criteria ?? []),
            $request->query->getInt('page', 1), /*page number*/
            9 /*limit per page*/
        )
        ;

        return $this->render('search/recipe.html.twig', [
            'recipes' => $recipes,
            'pagination' => $pagination,
            'form' => $form,
        ]);
    } 
}
