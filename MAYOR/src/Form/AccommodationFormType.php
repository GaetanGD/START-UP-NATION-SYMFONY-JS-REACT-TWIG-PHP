<?php

namespace App\Form;

use App\Entity\Activity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AccommodationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('main_picture')
            ->add('price')
            ->add('equipment')
            ->add('reservation')
            ->add('atmosphere')
            ->add('country')
            ->add('postal_code')
            ->add('state')
            ->add('city')
            ->add('address_1')
            ->add('address_2')
            ->add('description')
            ->add('strong_point')
            ->add('weak_point')
            ->add('calendar')
           # ->add('yes')
           # ->add('user_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Activity::class,
        ]);
    }
}
