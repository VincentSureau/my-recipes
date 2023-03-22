<?php

namespace App\Form;

use App\Entity\Recipe;
use App\Entity\Season;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RecipeSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('search', SearchType::class, [
                'attr'=>[
                    'placeholder'=>'Recette, ingrédient ...',
                ],
                'label'=> false,
            ])
            ->add('level', ChoiceType::class, [
                'label'=> false,
                'placeholder'=> 'Niveau',
                'choices'=>[
                    'Facile'=>1,
                    'Intermédiaire'=>2,
                    'Difficile'=>3
                ],
                'required'=>false
            ])
            ->add('season', EntityType::class, [
                'label'=> false,
                'placeholder'=>'Saison',
                'class'=>Season::class,
                'required'=> false
            ])
            ->add('submit', SubmitType::class,[
                'attr'=>[
                    'class' =>'btn btn-success'
                ]
            ])
            ->add('type', ChoiceType::class,[
                'label'=>false,
                'required'=>false,
                'placeholder'=>'type',
                'choices'=>[
                    'Entrée'=>'Entrée',
                    'Plat'=>'Plats',
                    'Dessert'=>'Dessert'
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
