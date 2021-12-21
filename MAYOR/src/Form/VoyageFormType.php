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

class VoyageFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextareaType::class, [
            'attr' => ['class' => 'tinymce'],
        ])
        ->add('main_picture', FileType::class, [
            'label' => 'Photo de couverture',
            'mapped' => false,
            'required' => false,
            'constraints' => [
                new File([
                    'maxSize' => '4024k',
                    'mimeTypes' => [
                        'imagee/jpeg', 
                        'imagee/jpg', 
                        'imagee/png'
                    ],
                    'mimeTypesMessage' => 'Votre photo est non valide',
                ])
            ],
        ])
           # ->add('activity')
           # ->add('user_id')
            ->add('transport', ChoiceType::class, [
                'choices' => [
                    'avion' => 1,
                    'train' => 2,
                    'bus' => 3,
                    'voiture' => 4,
                    'moto' => 5,
                    'vélo' => 6,
                    'marche' => 7,
                ],
                'expanded'=> true,
                'multiple'=> true,
            ])
            ->add('weather_report', RangeType::class, [
                'attr' => [
                    'min' => 1,
                    'max' => 4,
                    'class' => 'range_form'
                ]
            ])
            ->add('price')
            ->add('equipment', ChoiceType::class, [
                'choices' => [
                    'oui' => 'oui',
                    'non' => 'non',
                ],
            'expanded' => true
            ])
            ->add('description')
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
