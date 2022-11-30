<?php

namespace App\Controller;

use App\Entity\Picture;
use App\Entity\User;
use App\Form\PictureType;
use App\Form\RegisterType;
use App\Service\FileService;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
  /**
   * @throws Exception
   */
  #[Route('/profil/{page}', name: 'app_profil', defaults: ['page' => 'infos'])]
  #[isGranted('IS_AUTHENTICATED_FULLY')]
  public function profil(
    string $page,
    Request $request,
    UserPasswordHasherInterface $passwordHasher,
    EntityManagerInterface $em,
    FileService $fileService
  ): Response
  {
    /** @var User $user */
    $user = $this->getUser();

    // Options to render view
    $options = ['page' => $page];

    if ($page === 'infos') {
      $formUser = $this->createForm(RegisterType::class, $user);
      $formUser->handleRequest($request);

      if ($formUser->isSubmitted() && $formUser->isValid()) {
        $actualPassword = $formUser->get('actualPassword')->getData();
        if ($passwordHasher->isPasswordValid($user, $actualPassword)) {
          $newPassword = $formUser->get('plaintPassword')->getData();
          if ($newPassword !== $actualPassword) {
            $hash = $passwordHasher->hashPassword($user, $newPassword);
            $user->setPassword($hash);
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('app_profil', ['page' => $page]);
          } else {
            $formUser->get('actualPassword')->addError(new FormError('Vous ne pouvez pas utiliser le même mot de passe précédent.'));
          }
        } else {
          $formUser->get('actualPassword')->addError(new FormError('Mot de passe incorrect.'));
        }
      }

      $options['formUser'] = $formUser->createView();

      $picture = $user->getPicture() ?? new Picture();
      $formAvatar = $this->createForm(PictureType::class, $picture);
      $formAvatar->handleRequest($request);

      if ($formAvatar->isSubmitted() && $formAvatar->isValid()) {
        $uploadFile = $fileService
          ->saveFile(
            $this->getParameter('public.folder').'/'.$this->getParameter('avatar.folder'),
            $picture->getFile(),
            $user->getPicture() ? $this->getParameter('public.folder') . '/' . $user->getPicture()->getPath() : null
          );
        $picture
          ->setCreatedAt(new DateTimeImmutable('now'))
          ->setPath($this->getParameter('avatar.folder').'/'.$uploadFile);

        $picture->setFile(null);

        $user->setPicture($picture);

        $em->persist($user);
        $em->flush();
        return $this->redirectToRoute('app_profil', ['page' => $page]);
      }

      $options['formAvatar'] = $formAvatar->createView();
    } else if ($page === 'ratings') {
      $options['ratings'] = $user->getComments();
      dump($options['ratings']);
    }

    return $this->render('profil/index.html.twig', $options);
  }
}
