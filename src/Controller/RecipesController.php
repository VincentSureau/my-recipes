<?php

namespace App\Controller;

use App\Form\RecipeSearchType;
use App\Repository\RecipeRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RecipesController extends AbstractController
{
    #[Route('/recipes', name: 'recipes')]
    public function index(RecipeRepository $recipeRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $form = $this->createForm(RecipeSearchType::class,);
        $recipes = $recipeRepository->findAll();

        if($form->handleRequest($request)->isSubmitted() && $form->isValid()){
            $criteria = $form->getData();
        }
        $pagination = $paginator->paginate(
            // if criteria is not defined, define it as an empty array
            $recipeRepository->findByExampleField($criteria ?? []), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            3 /*limit per page*/

        );
        return $this->render('recipes/index.html.twig', [
            'recipes' => $pagination,
            'form' => $form->createView(),
        ]);
    }

}



