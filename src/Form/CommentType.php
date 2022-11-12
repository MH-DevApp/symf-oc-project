<?php

namespace App\Form;

use App\Entity\Comment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    $builder
      ->add('content', TextareaType::class, [
        'row_attr' => [
          'class' => 'form-item'
        ],
        'attr' => [
          'placeholder' => 'Écrivez votre avis...'
        ],
        'label' => false
      ])
      ->add('score', IntegerType::class, [
        'label' => false,
        'attr' => [
          'min' => 1,
          'max' => 5
        ],
        'row_attr' => [
          'hidden' => true,
        ]
      ])
    ;
  }

  public function configureOptions(OptionsResolver $resolver): void
  {
    $resolver->setDefaults([
      'data_class' => Comment::class,
      'attr' => [
        'class' => 'form'
      ]
    ]);
  }
}
