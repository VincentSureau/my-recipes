<?php

namespace App\Form;

use App\Entity\Recipe;
use App\Form\MediaType;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('imageFile', VichFileType::class, [
                'required' => false,
                'allow_delete' => true,
                'asset_helper' => true,])
                ->add('images', CollectionType::class, [
                    'entry_type' => MediaType::class,
                    'entry_options' => ['label' => false],
                    'allow_add' => true,
                    'by_reference' => false,
                ])
            ->add('description')
            ->add('level')
            ->add('seasons')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
        ]);
    }
}
