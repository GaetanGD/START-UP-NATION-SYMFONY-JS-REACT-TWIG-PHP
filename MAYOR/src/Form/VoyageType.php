<?php

namespace App\Form;

use App\Entity\Activity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoyageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
           
            ->add('main_picture')
            ->add('country')
            ->add('state')
            ->add('city')
            ->add('description')
            ->add('price')
            ->add('equipment')
            ->add('transport')
            ->add('atmosphere')
            ->add('top food')
            ->add('top activity')
            ->add('top logement')
            ->add('top conseil')
            ->add('yes')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Activity::class,
        ]);
    }
}
