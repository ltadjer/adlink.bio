<?php

namespace App\Form;

use App\Entity\SectionDiscount;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CodeStyleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('bgColor', ColorType::class,['label' => 'Couleur de l\'arrière-plan :'])
            ->add('bgCodeColor', ColorType::class,['label' => 'Couleur de l\'arrière-plan du code :'])
            ->add('textCodeColor', ColorType::class,['label' => 'Couleur du texte du code :'])
            ->add('bgCardColor', ColorType::class,['label' => 'Couleur de l\'arrière-plan de la card :'])
            ->add('textCardColor', ColorType::class,['label' => 'Couleur du texte de la description :'])
            ->add('save', SubmitType::class, ['label' => 'Enregistrer'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SectionDiscount::class,
        ]);
    }
}
