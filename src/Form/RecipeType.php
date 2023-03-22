<?php

namespace App\Form;

use App\Entity\Recipe;
use App\Form\MediaType;
use App\Utils\RecipeTypes;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\UX\LiveComponent\Form\Type\LiveCollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class, [
                'label' => 'Nom de la recette'
            ])
            ->add('imageFile', VichFileType::class, [
                'required' => false,
                'allow_delete' => true,
                'asset_helper' => true,
                'label' => 'Image de mise en avant'
            ])
            ->add('images', LiveCollectionType::class, [
                'entry_type' => MediaType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description'
            ])
            ->add('level', null, [
                'label' => 'Difficulté'
            ])
            ->add('level',ChoiceType::class,[
                'label' => 'Saisons',
                'choices'=>[
                    '1'=>'1',
                    '2'=>'2',
                    '3'=>'3'
                ],
            ])
            // ->add('type', EnumType::class, [
            //     'class' => RecipeTypes::class,
            //     'choice_label' => 'value',
            //     'required' => false,
            //     'placeholder' => 'Type'
            // ])
            ->add('seasons', null, [
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
