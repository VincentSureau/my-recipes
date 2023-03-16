<?php

namespace App\Form;

use App\Entity\Recipe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('level')
            ->add('imageFile', VichImageType::class,[
                'required' => false,
                'allow_delete' => true,
                'delete_label' => 'Supprimer l\'image',
                'download_label' => true,
                'download_uri' => true,
                'image_uri' => true,
                'imagine_pattern' => null,
                'asset_helper' => false,
                'storage_resolve_method' => VichImageType::STORAGE_RESOLVE_PATH_RELATIVE,
                'label'=> 'Fichier image'
            ])
            ->add('liked_by')
            // ->add('liked_by', TextType::class, [
            //     'label' => 'Aimé par '
            // ])
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
