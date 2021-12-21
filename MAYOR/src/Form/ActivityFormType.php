<?php

namespace App\Form;

use App\Entity\Activity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Translation\TranslatableMessage;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;



class ActivityFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('main_picture', FileType::class,[
                'label' => 'Photo de couverture',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '4024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/jpg',
                            'image/png',
                        ],
                        #'mimeTypesMessage' => 'Votre photo est non validé'
                    ])
                    ],
            ])
            ->add('price', null, [
                'help' => 'Veuillez indiquer un prix approximatif de votre activité.',
            ])
            ->add('equipment', ChoiceType::class, [
                'choices'    => [
                    'Faut-il prévoir du matériel ? (oui)' => 'oui',
                    'Faut-il prévoir du matériel ? (non)' => 'non',
                ], 
                'expanded' => true
            ])
            ->add('reservation', ChoiceType::class, [
                'choices'    => [
                    'Faut-il réserver à l’avance ? (oui)' => 'oui',
                    'Faut-il réserver à l’avance ? (non)' => 'non',
                ], 
                'expanded' => true
            ])
            ->add('atmosphere', ChoiceType::class, [
                'choices'    => [
                    'Familiale' => 1,
                    'Reposant' => 2,
                    'Festif' => 3,
                    'Chic' => 4,
                    'Populaire' => 5,
                ], 
                'expanded' => true
            ])
            ->add('country', CountryType::class, array())
            ->add('city')
           # ->add('state')
            ->add('postal_code')
            ->add('address_1')
            #->add('address_2')
            ->add('calendar', DateType::class, [
                'widget' => 'choice',
            ])
            ->add('description')
            ->add('strong_point')
            ->add('weak_point')
            #->add('yes')
            #->add('user_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Activity::class,
        ]);
    }
}
