<?php

namespace App\Form;

use App\Entity\Season;
use App\Entity\Ingredient;
use Symfony\Component\Form\AbstractType;
use Symfony\UX\Dropzone\Form\DropzoneType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
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
            ->add('imageFile', VichImageType::class,[
                'required' => false,
                'allow_delete' => true,
                'delete_label' => 'Supprimer l\'image',
                'download_label' => true,
                'download_uri' => true,
                'image_uri' => true,
                'imagine_pattern' => 'images_ingredients_320x240',
                'asset_helper' => true,
                'storage_resolve_method' => VichImageType::STORAGE_RESOLVE_PATH_RELATIVE,
            ])
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
