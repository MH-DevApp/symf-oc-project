<?php

namespace App\Controller;

use App\Entity\Game;
use App\Entity\Picture;
use App\Entity\Platform;
use App\Form\GameType;
use App\Form\PictureType;
use App\Repository\PlatformRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/game')]
class GameController extends AbstractController
{
  /**
   * @throws Exception
   */
  #[Route('/view/{name}', name: 'app_game_view')]
  #[ParamConverter('game', options: ['mapping' => ['name' => 'name']])]
  public function view(
    ?Game $game,
    Request $request,
    PlatformRepository $repo,
    EntityManagerInterface $em,
  ): Response
  {
    if (!$game) {
      return $this->redirectToRoute('app_home');
    }

    $picture = new Picture();

    $form = $this->createForm(PictureType::class, $picture);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $folder = $this->getParameter('game.folder');
      $ext = $picture->getFile()->guessExtension() ?? 'bin';
      $filename = bin2hex(random_bytes(10)) . '.' . $ext;
      $picture->getFile()->move($folder, $filename);
      $picture->setPath($this->getParameter('game.folder.public_path').'/'.$filename);
      $picture->setCreatedAt(new \DateTimeImmutable('now'));
      dump($picture);

      // UPDATE GAME AND FLUSH

      return $this->redirectToRoute('app_game_view', [
        'name' => $game->getName()
      ]);
    }

    return $this->render('game/view.html.twig', [
      'game' => $game,
      'form' => $form->createView()
    ]);
  }

  #[Route('/new', name: 'app_game_new')]
  #[IsGranted('IS_AUTHENTICATED_FULLY')]
  public function addGame(
    Request $request,
    PlatformRepository $repo,
    EntityManagerInterface $em,
  ): Response
  {
    $game = new Game();

    $form = $this->createForm(GameType::class, $game);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      while($game->getPlatforms()->count() > 0) {
        $game->removePlatform($game->getPlatforms()[0]);
      }

      /** @var array<Platform> $platformsSelected */
      $platformsSelected = $repo->findByIds($form->get('platformsSelected')->getData());
      if (count($platformsSelected)) {
        foreach ($platformsSelected as $platform) {
          $game->addPlatform($platform);
        }

        $game
          ->setCreatedAt(new \DateTimeImmutable('now'))
          ->setAuthor($this->getUser());

        $em->persist($game);
        $em->flush();

        return $this->redirectToRoute('app_game_view', ['name' => $game->getName()]);

      } else {
        $form->get('platformsSelected')->addError(new FormError('La plateforme est invalide.'));
      }
    }

    return $this->render('game/form_game.html.twig', [
      'form' => $form->createView()
    ]);
  }

  #[Route('/edit/{name}', name: 'app_game_edit')]
  #[IsGranted('IS_AUTHENTICATED_FULLY')]
  public function editGame(
    Game $game,
    Request $request,
    PlatformRepository $repo,
    EntityManagerInterface $em,
  ): Response
  {

    $form = $this->createForm(GameType::class, $game);
    $form->handleRequest($request);

    if ($form->isSubmitted()) {
      if ($form->isValid()) {
        $platformsSelected = $repo->findByIds($form->get('platformsSelected')->getData());
        dump($platformsSelected);
      }

      dump($game->getPictures());
      dump($request);
    }

    return $this->render('game/form_game.html.twig', [
      'form' => $form->createView()
    ]);
  }

}
