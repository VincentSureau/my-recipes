<?php

namespace App\Form;

use App\Entity\Recipe;
use App\Entity\Newsletter;
use Symfony\Config\FosCkEditorConfig;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class NewsletterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content', CKEditorType::class, [
                'label' => 'Description',
                'config' => array('toolbar' => 'full'),
               
            
            ])
            ->add('sendAt',  DateType::class, [
                'label' => 'Date de début',
                'widget' => 'single_text',
                'input'  => 'datetime_immutable'
            ])
            ->add('recipes', null, [
                'label' => 'Recettes'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Newsletter::class,
        ]);
    }

        /**
         * Get the value of builder
         */ 
        public function getBuilder()
        {
                return $this->builder;
        }
}
