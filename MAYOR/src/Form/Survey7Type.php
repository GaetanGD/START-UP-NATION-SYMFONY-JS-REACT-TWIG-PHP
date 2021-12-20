<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\CallbackTransformer;
// use Symfony\Component\Form\Extension\Core\Type\DatalistType;

class Survey7Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('geographical_area', ChoiceType::class, [
            'attr' => ['class' => 'hidden_box'],
            'choices'  => [
                'Europe' => 'europe',
                'Afrique' => 'afrique',
                'Amérique du Nord' => 'amerique_du_nord',
                'Antartique' => 'antartique',
                'Amérique du sud' => 'amerique_du_sud',
                'Asie' => 'asie',
                'Océanie' => 'oceanie',
                'Système Solaire' => 'tous',
            ],
            'expanded' => true,
            'multiple' => true,
        ]);
        $builder->get('geographical_area')->addModelTransformer(new CallbackTransformer(
            function ($array) {
                return json_decode($array);
            },
            function ($array) {
                return json_encode($array);
            }
        )); 
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
