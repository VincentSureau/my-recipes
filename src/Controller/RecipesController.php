<?php

namespace App\Controller;

use App\Form\SearchType;
use App\Repository\RecipeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RecipesController extends AbstractController
{
    #[Route('/recipes', name: 'recipes')]
    public function index(RecipeRepository $recipeRepository, PaginatorInterface $paginator, Request $request, ): Response
    {

        // On déclare form
        $form = $this->createForm(SearchType::class);
        $form->handleRequest($request);
        
        $pagination = $paginator->paginate(
            $recipeRepository->findAll(), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            8 /*limit per page*/
        );
        return $this->render('recipes/index.html.twig', [
            // 'recipes' => $recipes,
            'pagination' => $pagination,
            'form' => $form
            

        ]);
    }
    // public function findBySeason($seasons)
    // {
    //     $entityManager = $this->getDoctrine()->getManager();

    //     $products = $entityManager->getRepository(Product::class)
    //         ->findBySeason($seasons);

    //     return $this->render('recipe/index.html.twig', [
    //         'season' => $seasons,
    //     ]);
    // }
}
