<?php

namespace App\Form;

use App\Entity\Picture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;

class PictureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('file', FileType::class, [
              'label' => false,
              'row_attr' => [
                'class' => 'hidden'
              ],
              'constraints' => [
                new Image([
                  'mimeTypesMessage' => 'Veuillez soumettre une image',
                  'maxSize' => '1M',
                  'maxSizeMessage' => 'Votre image fait {{ size }} {{ suffix }}. La limite est de {{ limit }} {{ suffix }}.'
                ])
              ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Picture::class,
        ]);
    }
}
