<?php

namespace App\Form;

use App\Entity\SectionLink;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class LinkStyleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('bgColor', ColorType::class,['label' => 'Couleur de l\'arrière-plan :', 'required' => false])
        ->add('bgBtnColor', ColorType::class,['label' => 'Couleur des boutons :', 'required' => false])
        ->add('textBtnColor', ColorType::class,['label' => 'Couleur du texte des boutons :', 'required' => false])
        ->add('save', SubmitType::class, ['label' => 'Enregistrer', 'attr' => ['class' => 'btn-save']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SectionLink::class,
        ]);
    }
}
