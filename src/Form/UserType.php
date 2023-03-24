<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('username')
            ->add('isSubscribed')
            ->add('isVerified')
            ->add('roles', ChoiceType::class,[
                'label'=>'Statut',
                'choices'=>[

                    // il faut écrire de la meme facon que la BD MYSQL pour que symfony le comprenne
                    //  admin'=>'ROLE_ADMIN',
                    'admin'=>'ROLE_ADMIN',
                    'user'=>'ROLE_USER',
                    'editor'=>'ROLE_EDITOR'
                ],
                'multiple'=> true

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
