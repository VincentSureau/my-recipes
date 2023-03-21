<?php

namespace App\Twig\Components;

use App\Utils\SearchRecipe;
use App\Form\RecipeSearchType;
use App\Repository\RecipeRepository;
use Symfony\Component\Form\FormInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[AsLiveComponent('recipes')]
final class RecipesComponent extends AbstractController
{
    use DefaultActionTrait;
    use ComponentWithFormTrait;

    // #[LiveProp(writable: true)]
    // public string $query = "";

    private Request $request;

    #[LiveProp(fieldName: 'data')]
    public SearchRecipe $search;

    public function mount(SearchRecipe $search = null)
    {
        $this->search = $search ?? new SearchRecipe();
    }

    public function __construct(
        private RecipeRepository $recipeRepository,
        private PaginatorInterface $paginator,
        private RequestStack $requestStack
    ){
        $this->request = $this->requestStack->getCurrentRequest();
    }

    public function getRecipes(): PaginationInterface
    {
        // dd($this->search);
        $pagination = $this->paginator->paginate(
            $this->recipeRepository->search($this->search), /* query NOT result */
            $this->request->query->getInt('page', 1), /*page number*/
            3 /*limit per page*/
        );

        return $pagination;
    }

    protected function instantiateForm(): FormInterface
    {
        // we can extend AbstractController to get the normal shortcuts
        return $this->createForm(RecipeSearchType::class, $this->search);
    }
}
