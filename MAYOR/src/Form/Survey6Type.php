<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\CallbackTransformer;

class Survey6Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('favorite_food', ChoiceType::class, [
            'attr' => ['class' => 'hidden_box'],
            'choices'  => [
                'Asiatique' => 'asiatique',
                'Africaine' => 'africaine',
                'Américaine' => 'americaine',
                'Européenne' => 'europeenne',
                'Indienne' => 'indienne',
                'Extraterestre' => 'tous',
            ],
            'expanded' => true,
            'multiple' => true,
        ]);    
        $builder->get('favorite_food')->addModelTransformer(new CallbackTransformer(
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
