<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\GameRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminController extends AbstractController
{
    #[Route('/dashboard/{page}', name: 'app_admin', defaults: ['page' => 'users'])]
    public function dashboard(
      string $page,
      UserRepository $userRepository,
      GameRepository $gameRepository
    ): Response
    {
      if (!$this->isGranted('ROLE_ADMIN')) {
        throw $this->createNotFoundException();
      }
      $options = ['page' => $page];

      switch ($page) {
        case 'users':
          $options['users'] = $userRepository->findBy([], ['createdAt' => 'ASC']);
          break;
        case 'games':
          $options['games'] = $gameRepository->findBy([], ['name' => 'ASC']);
          break;
      }

      return $this->render('admin/index.html.twig', [
        ...$options
      ]);
    }

    #[Route('/user/{idUser}/toggleActive', name: 'app_admin_user_toggle_active')]
    public function toggleUserActive(
      string $idUser,
      UserRepository $userRepository,
      Request $request,
      EntityManagerInterface $em
    ): Response {
      $user = $userRepository->find($idUser);
      if (!$this->isGranted('ROLE_ADMIN') || !$user) {
        throw $this->createNotFoundException();
      }

      $user->setIsActive(!$user->isActive());
      $em->persist($user);
      $em->flush();

      return $this->redirect($request->headers->get('referer'));

    }
}
