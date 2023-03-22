<?php

namespace App\Form;

use App\Entity\Season;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('season', EntityType::class, [
            'class' => Season::class,
            'placeholder' => 'Saison',
            'required' =>false
        ])
        ->add('level', ChoiceType::class, [
            'label' => Season::class,
            'placeholder' => 'Niveau',
            'choices' => [
                'Facile' => 1,
                'Intermédiraire' => 2,
                'Difficile' => 3,
            ],
            'required' =>false
        ])
        ->add('submit', SubmitType::class,[
            'attr' => [
                'class' => 'btn btn-success'
            ]
        ]);
     }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
