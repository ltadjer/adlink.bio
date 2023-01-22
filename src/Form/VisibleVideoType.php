<?php

namespace App\Form;

use App\Entity\SectionVideo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VisibleVideoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('visible', ChoiceType::class, ['label' => 'Section visible :',
            'choices' => [
                'Afficher' => true,
                'Cacher' => false,
            ], 'attr' => ['class' => 'visible-choice']])
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
