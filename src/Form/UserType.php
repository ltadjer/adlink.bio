<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, ['label' => 'Nouvelle adresse email :','attr' => ['placeholder' => 'Ex : Adlink@adl.fr', 'class' => 'form-input'], 'required' => false])
            ->add('pseudo', TextType::class, ['label' => 'Nouveau nom :','attr' => ['placeholder' => 'Ex : Adlink', 'class' => 'form-input'], 'required' => false])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'label' => 'Nouveau mot de passe :',
                'required' => false,
                'attr' => ['autocomplete' => 'new-password', 'placeholder' => 'Nouveau mot de passe', 'class' => 'form-input'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrer un nouveau mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Le mot de passe doit contenir au minimum {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 24,
                    ]),
                ],
            ])
            ->add('slug', TextType::class, ['label' => 'Nouveau slug :','attr' => ['placeholder' => 'Ex : adl', 'class' => 'form-input'], 'required' => false])
            ->add('save', SubmitType::class, ['label' => 'Enregistrer', 'attr' => ['class' => 'btn-save']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
