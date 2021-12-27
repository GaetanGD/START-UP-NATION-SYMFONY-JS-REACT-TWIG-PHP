<?php

namespace App\Form;


use App\Entity\Travel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\CallbackTransformer;

class VoyageFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextareaType::class, [
            'attr' => [
                'placeholder' => 'Nom de votre Trip'
            ],
        ])
        ->add('main_picture', FileType::class, [
            'label' => 'Ajouter une photo de couverture',
            'mapped' => false,
            'required' => false,
            'constraints' => [
                new File([
                    'maxSize' => '4024k',
                    'mimeTypes' => [
                        'image/jpeg', 
                        'image/jpg', 
                        'image/png'
                    ],
                    'mimeTypesMessage' => 'Votre photo est non valide',
                ])
            ],
        ])
           # ->add('activity')
           # ->add('user_id')
            ->add('transport', ChoiceType::class, [
                'attr' => [
                    'class' => 'annul_border'
                ],
                'choices' => [
                    'avion' => 'avion',
                    'train' => 'train',
                    'bus' => 'bus',
                    'voiture' => 'voiture',
                    'moto' => 'moto',
                    'vélo' => 'velo',
                    'marche' => 'marche',
                ],
                'expanded'=> true,
                'multiple'=> true,
            ])
            ->add('weather_report', RangeType::class, [
                'attr' => [
                    'min' => 1,
                    'max' => 4,
                    'class' => 'range_form2'
                ]
            ])
            ->add('price')
            ->add('equipment', ChoiceType::class, [
                'attr' => [
                    'class' => 'form_equipement_oui_non'
                ],
                'choices' => [
                    'oui' => 'oui',
                    'non' => 'non',
                ],
            'expanded' => true
            ])
            ->add('description')
            ->add('advice')
        ;
        $builder->get('transport')->addModelTransformer(new CallbackTransformer(
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
            'data_class' => Travel::class,
        ]);
    }
}
