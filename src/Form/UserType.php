<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            // ->add('roles')
            ->add('password', PasswordType::class,[
                'label'=>'Mot de passe'
            ])
            ->add('username', TextType::class,[
                'label'=>'Pseudo'
            ])
            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => true,
                'delete_label' => 'Supprimer l\'image',
                'download_label' => true,
                'download_uri' => true,
                'image_uri' => true,
                'imagine_pattern' => null,
                'asset_helper' => false,
                'storage_resolve_method' => VichImageType::STORAGE_RESOLVE_PATH_RELATIVE,
                'label'=> 'Avatar'
            ])
            ->add('isSubscribed', CheckboxType::class,[
                'label'=>"L'utilisateur souscrit à la newsletter"
            ])
            ->add('isVerified', CheckboxType::class,[
                'label'=>"L'utilisateur est vérifié"
            ])
            ->add('likes',TextType::class,[
                'label'=> 'Aimé par'
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
