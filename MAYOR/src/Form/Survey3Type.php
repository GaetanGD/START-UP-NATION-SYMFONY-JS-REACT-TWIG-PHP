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

class Survey3Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        // ->add('user_picture')
        // ->add('certification')
        // ->add('about')
        ->add('budget', RangeType::class, [
            'attr' => [
                'min' => 1,
                'max' => 6,
                'class' => 'range_form'
            ],
        ]);
        // ->add('temperature', RangeType::class, [
        //     'attr' => [
        //         'min' => 1,
        //         'max' => 4,
        //         'class' => 'range_form'
        //     ],
        // ])
        // ->add('duration', RangeType::class, [
        //     'attr' => [
        //         'min' => 1,
        //         'max' => 6,
        //         'class' => 'range_form'
        //     ],
        // ])
        // ->add('favorite_food', ChoiceType::class, [
        //     'attr' => ['class' => 'hidden_box'],
        //     'choices'  => [
        //         'Asiatique' => 'asiatique',
        //         'Africaine' => 'africaine',
        //         'Américaine' => 'americaine',
        //         'Européenne' => 'europeenne',
        //         'Indienne' => 'indienne',
        //         'Extraterestre' => 'tous',
        //     ],
        //     'expanded' => true,
        //     'multiple' => true,
        // ])    
        // ->add('geographical_area', ChoiceType::class, [
        //     'attr' => ['class' => 'hidden_box'],
        //     'choices'  => [
        //         'Europe' => 'europe',
        //         'Afrique' => 'afrique',
        //         'Amérique du Nord' => 'amerique_du_nord',
        //         'Antartique' => 'antartique',
        //         'Amérique du sud' => 'amerique_du_sud',
        //         'Asie' => 'asie',
        //         'Océanie' => 'oceanie',
        //         'Système Solaire' => 'tous',
        //     ],
        //     'expanded' => true,
        //     'multiple' => true,
        // ])
        // ->add('means_of_locomotion', ChoiceType::class, [
        //     'attr' => ['class' => 'hidden_box'],
        //     'choices'  => [
        //         'A pied' => 'a_pied',
        //         'A bicyclette' => 'a_bicyclette',
        //         '2 roues motorisées' => '2_roues_motorisees',
        //         'Bus' => 'bus',
        //         'Voiture' => 'voiture',
        //         'Train' => 'train',
        //         'Avion' => 'avion',
        //         'A dos de chameau' => 'tous',
        //     ],
        //     'expanded' => true,
        //     'multiple' => true,
        // ])
        // ->add('difficulty_level', RangeType::class, [
        //     'attr' => [
        //         'min' => 1,
        //         'max' => 6,
        //         'class' => 'range_form'
        //     ],
        // ])
        // ->add('accompaniement', ChoiceType::class, [
        //     'attr' => ['class' => 'hidden_box'],
        //     'choices'  => [
        //         'Solitaire' => 'solitaire',
        //         'Couple' => 'couple',
        //         'Amis' => 'amis',
        //         'Famille' => 'Famille',
        //         'Équipe de foot' => 'tous',
        //     ],
        //     'expanded' => true,
        //     'multiple' => true,
        // ])
        // ->add('comfort', RangeType::class, [
        //     'attr' => [
        //         'min' => 1,
        //         'max' => 6,
        //         'class' => 'range_form'
        //     ],
        // ])
        // ->add('environment', RangeType::class, [
        //     'attr' => [
        //         'min' => 1,
        //         'max' => 3,
        //         'class' => 'range_form'
        //     ],
        // ]);
        // $builder->get('favorite_food')->addModelTransformer(new CallbackTransformer(
        //     function ($array) {
        //         return json_decode($array);
        //     },
        //     function ($array) {
        //         return json_encode($array);
        //     }
        // ));    
        // $builder->get('geographical_area')->addModelTransformer(new CallbackTransformer(
        //     function ($array) {
        //         return json_decode($array);
        //     },
        //     function ($array) {
        //         return json_encode($array);
        //     }
        // )); 
        // $builder->get('means_of_locomotion')->addModelTransformer(new CallbackTransformer(
        //     function ($array) {
        //         return json_decode($array);
        //     },
        //     function ($array) {
        //         return json_encode($array);
        //     }
        // )); 
        // $builder->get('accompaniement')->addModelTransformer(new CallbackTransformer(
        //     function ($array) {
        //         return json_decode($array);
        //     },
        //     function ($array) {
        //         return json_encode($array);
        //     }
        // )); 
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
