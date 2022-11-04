<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
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
  public function signup(
    Request $request,
    UserPasswordHasherInterface $passwordHasher,
    EntityManagerInterface $em
  ): Response
  {
    if ($this->getUser()) {
      return $this->redirectToRoute('app_home');
    }

    $user = new User();

    $form = $this->createForm(RegisterType::class, $user);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      if (!$em->getRepository(User::class)->findOneBy(['pseudo' => $user->getPseudo()])) {
        $user->setCreatedAt(new \DateTimeImmutable("now"));
        $hash = $passwordHasher->hashPassword($user, $user->getPassword());
        $user->setPassword($hash);

        $em->persist($user);
        $em->flush();

        return $this->redirectToRoute('app_auth_signin', []);
      }
      $form->get('pseudo')->addError(new FormError('Ceci est un test'));
    }

    return $this->render('auth/signup.html.twig', [
      'form' => $form->createView()
    ]);
  }

  #[Route(path: '/logout', name: 'app_auth_logout')]
  public function logout(): void
  {
    throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
  }
}
