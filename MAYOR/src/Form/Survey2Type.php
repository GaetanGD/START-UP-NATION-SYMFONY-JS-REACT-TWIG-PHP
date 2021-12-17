<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\RangeType;

class Survey2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('user_picture')
        ->add('certification')
        ->add('about')
        ->add('budget', RangeType::class, [
            'attr' => [
                'min' => 1,
                'max' => 6
            ],
        ])
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
