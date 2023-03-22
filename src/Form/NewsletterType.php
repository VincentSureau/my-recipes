<?php

namespace App\Form;

use App\Entity\Recipe;
use App\Entity\Newsletter;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class NewsletterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content', CKEditorType::class,  [
                // 'config'=>array(
                // 'uiColor' => '#ffffff',
                // ),
                // 'label' => 'Description'
            ])
           
            ->add('sendAt', DateType::class, [
                'label' => "Date d'envoi",
                'widget' => 'single_text',
                'input'  => 'datetime_immutable'
            ])

            ->add('recipes', null, [
                'label' => 'Recettes',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Newsletter::class,
        ]);
    }
}
