<?php

namespace App\Form;

use App\Entity\SectionNetwork;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class NetworkStyleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('bgColor', ColorType::class,['label' => 'Couleur de l\'arrière-plan :', 'required' => false])
        ->add('iconColor', ColorType::class,['label' => 'Couleur des icônes :', 'required' => false])
        ->add('save', SubmitType::class, ['label' => 'Enregistrer', 'attr' => ['class' => 'btn-save']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SectionNetwork::class,
        ]);
    }
}
