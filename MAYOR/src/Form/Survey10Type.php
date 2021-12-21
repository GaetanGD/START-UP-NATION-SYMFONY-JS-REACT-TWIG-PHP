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

class Survey10Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('accompaniement', ChoiceType::class, [
            'attr' => ['class' => 'hidden_box'],
            'choices'  => [
                'Solitaire' => 'solitaire',
                'Couple' => 'couple',
                'Amis' => 'amis',
                'Famille' => 'Famille',
                'Équipe de foot' => 'tous',
            ],
            'expanded' => true,
            'multiple' => true,
        ]);
        $builder->get('accompaniement')->addModelTransformer(new CallbackTransformer(
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
