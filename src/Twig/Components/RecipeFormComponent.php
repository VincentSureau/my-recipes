<?php

namespace App\Twig\Components;

use App\Entity\Recipe;
use App\Form\RecipeType;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\LiveCollectionTrait;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[AsLiveComponent('recipe_form')]
final class RecipeFormComponent extends AbstractController
{
    use DefaultActionTrait;
    use LiveCollectionTrait;

    #[LiveProp(fieldName: 'formData')]
    public ?Recipe $recipe;

    protected function instantiateForm(): FormInterface
    {
        return $this->createForm(
            RecipeType::class,
            $this->recipe
        );
    }
}
