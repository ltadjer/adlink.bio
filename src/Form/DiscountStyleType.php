<?php

namespace App\Form;

use App\Entity\SectionDiscount;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class DiscountStyleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('bgColor', ColorType::class,['label' => 'Couleur de l\'arrière-plan :', 'required' => false, 'attr' => ['class' => 'form-color']])
        ->add('bgCodeColor', ColorType::class,['label' => 'Couleur de l\'arrière-plan du code :', 'required' => false, 'attr' => ['class' => 'form-color']])
        ->add('textCodeColor', ColorType::class,['label' => 'Couleur du texte du code :', 'required' => false, 'attr' => ['class' => 'form-color']])
        ->add('bgCardColor', ColorType::class,['label' => 'Couleur de l\'arrière-plan de la card :', 'required' => false, 'attr' => ['class' => 'form-color']])
        ->add('textCardColor', ColorType::class,['label' => 'Couleur du texte de la description :', 'required' => false, 'attr' => ['class' => 'form-color']])
        ->add('save', SubmitType::class, ['label' => 'Enregistrer', 'attr' => ['class' => 'btn-save']])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SectionDiscount::class,
        ]);
    }
}
