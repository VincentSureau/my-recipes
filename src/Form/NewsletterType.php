<?php

namespace App\Form;

use App\Entity\Newsletter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Recipe;

class NewsletterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content', CKEditorType::class, [
                'label' => 'Description de la newsletter',
                'config' => [
                'uiColor' => '#ffffff',
                ],
            ])     
            ->add('sendAt', DateType::class, [ 
            'label' => 'Date d\'envoi',
            'widget' => 'single_text',
            'input'  => 'datetime_immutable'
            ])
            ->add('recipes', EntityType::class, [
                'class' => Recipe::class,
                'label' => 'Recettes',
                'multiple' => true

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Newsletter::class,
        ]);
    }
}
