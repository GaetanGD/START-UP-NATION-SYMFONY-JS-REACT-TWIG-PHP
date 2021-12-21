<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\CallbackTransformer;

class Survey8Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('means_of_locomotion', ChoiceType::class, [
            'attr' => ['class' => 'hidden2_box'],
            'choices'  => [
                'A pied' => 'a_pied',
                'A bicyclette' => 'a_bicyclette',
                '2 roues motorisées' => '2_roues_motorisees',
                'Bus' => 'bus',
                'Voiture' => 'voiture',
                'Train' => 'train',
                'Avion' => 'avion',
                'A dos de chameau' => 'tous',
            ],
            'expanded' => true,
            'multiple' => true,
        ]);
        $builder->get('means_of_locomotion')->addModelTransformer(new CallbackTransformer(
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
