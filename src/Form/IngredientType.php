<?php

namespace App\Form;

use App\Entity\Season;
use App\Entity\Ingredient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class IngredientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de l\'ingrédient'
            ])
            ->add('image')
            ->add('type', ChoiceType::class, [
                'choices'  => [
                    'Fruit' => 'Fruit',
                    'Légume' => "Légume",
                    'Condiment' => "Condiment",
                ],
            ])
            ->add('description')
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
            'data_class' => Ingredient::class,
        ]);
    }
}
