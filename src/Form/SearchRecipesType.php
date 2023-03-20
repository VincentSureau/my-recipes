<?php

namespace App\Form;

use App\Entity\Recipe;
use App\Entity\Season;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SearchRecipesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
     
        $builder
            ->add('name',TextType::class, [
                'label' => 'Nom de la recette',
                'required' => false,
            ])
            ->add('level',ChoiceType::class,[
                'label' => 'Difficulté',
                'choices'=>[
                    '1'=>'1',
                    '2'=>'2',
                    '3'=>'3'
                ],
            ])
            ->add('seasons', EntityType::class, [
                'class' => Season::class
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // 'data_class' => Recipe::class,
        ]);
    }
}
