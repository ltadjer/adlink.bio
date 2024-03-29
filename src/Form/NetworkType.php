<?php

namespace App\Form;

use App\Entity\Network;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NetworkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('instagram', TextType::class, ['label' => 'Lien Instagram :', 'required' => false, 'attr' => ['class' => 'form-input', 'placeholder' => 'Ex : adlink-bio']])
            ->add('facebook', TextType::class, ['label' => 'Lien Facebook :', 'required' => false, 'attr' => ['class' => 'form-input', 'placeholder' => 'Ex : adlinkbio']])
            ->add('youtube', TextType::class, ['label' => 'Lien Youtube :', 'required' => false, 'attr' => ['class' => 'form-input', 'placeholder' => 'Ex : @adlinkbio']])
            ->add('gitHub', TextType::class, ['label' => 'Lien GitHub :', 'required' => false, 'attr' => ['class' => 'form-input', 'placeholder' => 'Ex : adlink-bio']])
            ->add('twitter', TextType::class, ['label' => 'Lien Twitter :', 'required' => false, 'attr' => ['class' => 'form-input', 'placeholder' => 'Ex : adlink-bio']])
            ->add('tikTok', TextType::class, ['label' => 'Lien Tik Tok :', 'required' => false, 'attr' => ['class' => 'form-input', 'placeholder' => 'Ex : @adlinkbio']])
            ->add('save', SubmitType::class, ['label' => 'Enregistrer', 'attr' => ['class' => 'btn-save']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Network::class,
        ]);
    }
}
