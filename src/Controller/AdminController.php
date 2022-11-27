<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminController extends AbstractController
{
    #[Route('/dashboard/{page}', name: 'app_admin', defaults: ['page' => 'user'])]
    public function dashboard(string $page): Response
    {
      if (!$this->isGranted('ROLE_ADMIN')) {
        throw new NotFoundHttpException('La page que vous essayez de rejoindre n\'existe pas.');
      }
      $options = ['page' => $page];

        return $this->render('admin/index.html.twig', [
          ...$options
        ]);
    }
}
