<?php

namespace App\Form;

use App\Entity\Season;
use App\Utils\SearchRecipe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;

class RecipeSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('query', SearchType::class, [
                'label' => "Rechercher",
                'required' => false
            ])
            ->add('season', EntityType::class, [
                'attr' => [
                    'class' => 'bg-success text-white'
                ],
                'label' => 'Saison',
                'class' => Season::class,
                'required' => false,
                'placeholder' => 'Saison'
            ])
            ->add('level', ChoiceType::class, [
                'attr' => [
                    'class' => 'bg-success text-white'
                ],
                'label' => 'Difficulté',
                'choices' => [
                    'Facile' => 1,
                    'Intermédiaire' => 2,
                    'Difficile' => 3
                ],
                'placeholder' => 'Difficulté',
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SearchRecipe::class,
        ]);
    }
}
