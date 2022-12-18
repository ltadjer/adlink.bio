<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FontType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('font', ChoiceType::class, ['label' => 'Police du site',
                'choices' => [
                    'Roboto' => 'Roboto',
                    'Montserrat' => 'Montserrat',
                    'Lato' => 'Lato',
                    'Open sans' => 'Open sans',
                    'Poppins' => 'Poppins',
                    'Raleway'=> 'Raleway',
                    'Playfair Display'=> 'Playfair Display',
                    'Lora'=> 'Lora',
                    'Dancing Script'=> 'Dancing Script',
                    'Kalam'=> 'Kalam',
                    'Turret Road'=> 'Turret Road',
                    'Gluten'=> 'Gluten',
                ]])
            ->add('save', SubmitType::class, ['label' => 'Enregistrer'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
