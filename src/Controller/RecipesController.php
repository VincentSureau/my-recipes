<?php

namespace App\Controller;

use App\Form\SearchRecipesType;
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
        $form = $this->createForm(SearchRecipesType::class);
        $form->handleRequest($request);

        $recipes = $recipeRepository->createQueryBuilder("recipe"); // SELECT * FROM recipe
        $data = $form->getData();
        
        if (!empty($data["name"])) {
            $recipes->andWhere('recipe.name LIKE :name'); // WHERE name LIKE '%name%'
            $recipes->setParameter("name",  "%". addcslashes($data["name"], "\\%_") . "%");
        }
        if (!empty($data["level"])) {
            $recipes->andWhere("recipe.level = :level");
            $recipes->setParameter("level", $data["level"]);
        }
        if (!empty($data["seasons"]))  {
            $recipes->join("recipe.seasons", "season");
            $recipes->andWhere("season = :season");
            $recipes->setParameter("season", $data["seasons"]);
        }

        // recuperer les donnée de la base de donnée
        $pagination = $paginator->paginate(
            $recipes, 
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );
        return $this->render('recipes/index.html.twig', [
            'recipes' => $recipes,
            'pagination' => $pagination,
            'form' => $form,
        ]);
    }

}
