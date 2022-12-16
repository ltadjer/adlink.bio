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
            ->add('instagram', TextType::class, ['label' => 'Lien Instagram :'])
            ->add('facebook', TextType::class, ['label' => 'Lien Facebook :'])
            ->add('youtube', TextType::class, ['label' => 'Lien Youtube :'])
            ->add('gitHub', TextType::class, ['label' => 'Lien GitHub :'])
            ->add('twitter', TextType::class, ['label' => 'Lien Twitter :'])
            ->add('tikTok', TextType::class, ['label' => 'Lien Tik Tok :'])
            ->add('save', SubmitType::class, ['label' => 'Enregistrer'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Network::class,
        ]);
    }
}
