<?php

namespace App\Form;

use App\Entity\Game;
use App\Entity\Platform;
use App\Repository\PlatformRepository;
use PHPUnit\TextUI\XmlConfiguration\File;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;

class GameType extends AbstractType
{
  public function __construct(private PlatformRepository $repo){}

  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    $platformsFind = $this->repo->findAll();
    $platforms = [];

    foreach ($platformsFind as $platform) {
      $platforms[$platform->getName()] = $platform->getId()->jsonSerialize();
    }

    $builder
      ->add('name', TextType::class, [
        'row_attr' => [
          'class' => 'card-item'
        ],
        'label' => 'Nom du jeu'
      ])
      ->add('description', TextareaType::class, [
        'row_attr' => [
          'class' => 'card-item'
        ]
      ])
      ->add('platformsSelected', ChoiceType::class, [
        'mapped' => false,
        'multiple' => true,
        'expanded' => true,
        'choices' => $platforms,
        'row_attr' => [
          'class' => 'card-item'
        ],
        'label' => 'Plateformes',
        'constraints' => [
          new Choice([
            'multiple' => true,
            'choices' => $platforms,
            'min' => "1",
            'minMessage' => 'Veuillez sélectionner au minimum {{ limit }} plateforme(s).'
          ])
        ]
      ])
    ;
  }

  public function configureOptions(OptionsResolver $resolver): void
  {
    $resolver->setDefaults([
      'data_class' => Game::class,
      'attr' => [
        'class' => 'form'
      ]
    ]);
  }
}
