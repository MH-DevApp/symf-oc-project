<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;

class RegisterType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    /** @var User $user */
    $user = $options['data'];
    $builder
      ->add('email', EmailType::class, [
        'label' => 'Email',
        'required' => true,
        'row_attr' => [
          'class' => 'card-item'
        ],
        'constraints' => [
          new Email([
            'message' => 'L\'adresse email n\'est pas valide.'
          ])
        ]
      ]);

    if ($user->getId()) {
      $builder->add('actualPassword', PasswordType::class, [
        'mapped' => false,
        'label' => 'Mot de passe actuel',
        'required' => true,
        'row_attr' => [
          'class' => 'card-item'
        ]
      ]);
    }

      $builder->add('plaintPassword', RepeatedType::class, [
        'type' => PasswordType::class,
        'mapped' => false,
        'invalid_message' => 'Les mots de passe ne sont pas identiques.',
        'first_options' => [
          'label' => 'Mot de passe',
          'row_attr' => [
            'class' => 'card-item'
          ]
        ],
        'second_options' => [
          'label' => 'Confirmation du mot de passe',
          'row_attr' => [
            'class' => 'card-item'
          ]
        ],
        'required' => true,
        'constraints' => [
          new Length([
            'min' => 6,
            'max' => 20,
            'minMessage' => 'Le mot de passe doit contenir minimum {{ limit }} caractères.',
            'maxMessage' => 'Le mot de passe doit contenir maximum {{ limit }} caractères.'
          ])
        ]

      ])
      ->add('pseudo', TextType::class, [
        'label' => 'Pseudo',
        'required' => true,
        'row_attr' => [
          'class' => 'card-item'
        ],
        'constraints' => [
          new Regex([
            'pattern' => '/^[a-zA-Z0-9]+$/',
            'message' => 'Les caractères autre que [a => z], [A => Z], [0 => 9] ne sont pas autorisés.'
          ])
        ]
      ])
    ;
  }

  public function configureOptions(OptionsResolver $resolver): void
  {
    $resolver->setDefaults([
      'data_class' => User::class,
      'attr' => [
        'class' => 'form'
      ]
    ]);
  }
}
