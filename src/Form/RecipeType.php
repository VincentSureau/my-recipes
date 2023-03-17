<?php

namespace App\Form;

use App\Entity\Recipe;
use App\Entity\Season;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class, [
                'label' => 'Nom de la recette'
            ])
            ->add('description')
            ->add('level',ChoiceType::class,[
                'choices'=>[
                    '1'=>'1',
                    '2'=>'2',
                    '3'=>'3'
                ],
                ])
            ->add('imageFile', VichImageType::class)
            ->add('seasons', EntityType::class, [
                'class' => Season::class,
                'label' => 'Saisons',
                'multiple' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
        ]);
    }
}
