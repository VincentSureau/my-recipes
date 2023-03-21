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
use Symfony\Component\Form\Extension\Core\Type\SearchType;

class RecipeSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('level',ChoiceType::class,[
                'label' => false,
                'placeholder'=>'Niveau',
                'choices'=>[
                    'Facile'=>'1',
                    'Intermediaire'=>'2',
                    'Difficile'=>'3'
                ],
                'required' => false
            ])
            ->add('season', EntityType::class, [
                'label' => false,
                'placeholder' => 'Saison',
                'class'=> Season::class,
                'required' => false
            ])           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
        ]);
    }
}
