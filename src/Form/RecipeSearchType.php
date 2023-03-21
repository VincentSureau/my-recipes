<?php

namespace App\Form;

use App\Entity\Recipe;
use App\Entity\Season;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RecipeSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('level', ChoiceType::class, [
                'label' => false,
                'placeholder' => 'Difficulté',
                'choices' => [
                    'Facile' => 1,
                    'Intermédiaire' => 2,
                    'Difficile' => 3],
                'required' => false
            ])

            ->add('season', EntityType::class, [
                'label' => false,
                'placeholder' => 'Saisons',
                'class' => Season::class,
                'required' => false
            ])

            ->add('type', ChoiceType::class, [
                'label' => false,
                'placeholder' => 'Type',
                'required' => false,
                'choices' => [
                    'Entrée' => 'Entrée',
                    'Plat' => 'Plat',
                    'Dessert' => 'Dessert',
                ]
            ])

            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
                'attr' => [
                    'class' => 'btn btn-outline-success'
                ]
            ])

            ->add('search', TextType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Entrer un mot clé'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
        ]);
    }
}
