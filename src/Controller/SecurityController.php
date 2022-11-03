<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

#[Route('/auth')]
class SecurityController extends AbstractController
{
  #[Route('/signin', name: 'app_auth_signin')]
  public function signin(AuthenticationUtils $authenticationUtils): Response
  {
    if ($this->getUser()) {
       return $this->redirectToRoute('app_home');
    }

    // get the login error if there is one
    $error = $authenticationUtils->getLastAuthenticationError();
    // last username entered by the user
    $lastUsername = $authenticationUtils->getLastUsername();

    return $this->render('auth/signin.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
  }

  #[Route('/singup', name: 'app_auth_signup')]
  public function signup(): Response
  {
    $error = null;

    return $this->render('auth/signup.html.twig', ['error' => $error]);
  }

  #[Route(path: '/logout', name: 'app_auth_logout')]
  public function logout(): void
  {
    throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
  }
}
