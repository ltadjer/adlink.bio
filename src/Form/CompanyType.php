<?php

namespace App\Form;

use App\Entity\SectionCompany;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('logo')
            ->add('title', TextType::class, ['label' => 'Nom de l\'entreprise :'])
            ->add('baseline', TextareaType::class, ['label' => 'Baseline :'])
            ->add('bgColor', ColorType::class ,['label' => 'Couleur de l\'arrière-plan :'])
            ->add('titleColor', ColorType::class ,['label' => 'Couleur du titre :'])
            ->add('baselineColor', ColorType::class ,['label' => 'Couleur de la baseline :'])
            ->add('save', SubmitType::class, ['label' => 'Enregistrer'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SectionCompany::class,
        ]);
    }
}
