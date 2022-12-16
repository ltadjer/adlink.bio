<?php

namespace App\Form;

use App\Entity\SectionNetwork;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NetworkStyleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('bgColor', ColorType::class,['label' => 'Couleur de l\'arrière-plan :'])
            ->add('iconColor', ColorType::class,['label' => 'Couleur des icônes :'])
            ->add('save', SubmitType::class, ['label' => 'Enregistrer'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SectionNetwork::class,
        ]);
    }
}
