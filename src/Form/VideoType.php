<?php

namespace App\Form;

use App\Entity\SectionVideo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VideoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('link', TextType::class, ['label' => 'Lien YouTube de la vidéo :', 'required' => false, 'attr' => ['class' => 'form-input', 'placeholder' => 'Ex : https://www.youtube...']])
            ->add('altVideo', TextareaType::class, ['label' => 'Description de la vidéo :', 'required' => false, 'attr' => ['class' => 'form-input', 'placeholder' => 'Ex : Personne qui joue de...']])
            ->add('bgColor', ColorType::class,['label' => 'Couleur de l\'arrière-plan :', 'required' => false, 'attr' => ['class' => 'form-color']])
            ->add('save', SubmitType::class, ['label' => 'Enregistrer', 'attr' => ['class' => 'btn-save']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SectionVideo::class,
        ]);
    }
}
