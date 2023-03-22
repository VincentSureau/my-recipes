<?php

namespace App\Form;

use App\Entity\Recipe;
use App\Entity\Season;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RecipeSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('search', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Recherche',
                ],
                'required' => false
            ])

            ->add('level', ChoiceType::class, [
                'label' => false,
                'placeholder' => 'Niveau',
                'choices' => [
                    'Facile' => 1,
                    'Intermédiaire' => 2,
                    'Difficile' => 3
                ],
                'required' => false
            ])

            ->add('type', ChoiceType::class, [
                'label' => false,
                'placeholder' => 'Type',
                'choices' => [
                    'Entrée' => 1,
                    'Plat' => 2,
                    'Dessert' => 3,
                ],
                'required' => false,
            ])

            ->add('seasons', EntityType::class, [
                'label' => false,
                'placeholder' => 'Saison',
                'class' => Season::class,
                'required' => false
            ])

            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-success'
                ]
            ]);
    }
}
