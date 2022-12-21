<?php

namespace App\Form;

use App\Entity\SectionCompany;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('logoFile', VichImageType::class, ['label' => 'logo :', 'required' => false, 'download_label' => false])
            ->add('title', TextType::class, ['label' => 'Nom de l\'entreprise :', 'required' => false])
            ->add('baseline', TextareaType::class, ['label' => 'Baseline :', 'required' => false])
            ->add('bgColor', ColorType::class ,['label' => 'Couleur de l\'arrière-plan :', 'required' => false])
            ->add('titleColor', ColorType::class ,['label' => 'Couleur du titre :', 'required' => false])
            ->add('baselineColor', ColorType::class ,['label' => 'Couleur de la baseline :', 'required' => false])
            ->add('save', SubmitType::class, ['label' => 'Enregistrer', 'attr' => ['class' => 'btn-save']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SectionCompany::class,
        ]);
    }
}
