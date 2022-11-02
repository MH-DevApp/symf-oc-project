<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
  #[Route('/', name: 'app_home')]
  public function index(): Response
  {
      return $this->render('home/index.html.twig', []);
  }

  #[Route('/auth/signin', name: 'app_auth_signin')]
  public function signin(): Response
  {
      return $this->render('home/index.html.twig', []);
  }

  #[Route('/auth/singup', name: 'app_auth_signup')]
  public function signup(): Response
  {
      return $this->render('home/index.html.twig', []);
  }
}
