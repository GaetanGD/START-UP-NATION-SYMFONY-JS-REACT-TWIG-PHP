<?php

namespace App\Form;


use App\Entity\Travel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoyageFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('main_picture')
           # ->add('activity')
           # ->add('user_id')
            ->add('transport')
            ->add('weather_report')
            ->add('price')
            ->add('equipment')
            ->add('top_restaurant')
            ->add('top_activity')
            ->add('top_accommodation')
            ->add('advice')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Travel::class,
        ]);
    }
}
