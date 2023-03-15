<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


class BoUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, options: [
                'label' => 'Adresse E-mail',
                // 'help' => 'Votre email ne sera jamais partagé.',
                ])
                ->add('username', options: [
                    'label' => 'Pseudo',
                ])
            // ->add('roles')
           
            
            ->add('avatar', TextType::class, options:[])

            ->add('isSubscribed', options: [
                'label' => "Inscription à la newsletter.",
            ])
            ->add('isVerified', options: [
                'label' => "Email vérifié.",
            ])
            // ->add('likes')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
