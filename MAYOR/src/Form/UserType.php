<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('roles')
            ->add('password')
            ->add('firstname')
            ->add('lastname')
            ->add('newsletter')
            ->add('cgu')
            ->add('user_picture')
            ->add('certification')
            ->add('about')
            ->add('budget')
            ->add('temperature')
            ->add('duration')
            ->add('favorite_food')
            ->add('geographical_area')
            ->add('means_of_locomotion')
            ->add('difficulty_level')
            ->add('accompaniement')
            ->add('comfort')
            ->add('environment')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
