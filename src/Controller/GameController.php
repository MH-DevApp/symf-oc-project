<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Game;
use App\Entity\Picture;
use App\Entity\Platform;
use App\Form\CommentType;
use App\Form\GameType;
use App\Form\PictureType;
use App\Repository\CommentRepository;
use App\Repository\PlatformRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/game')]
class GameController extends AbstractController
{
  /**
   * @throws Exception
   */
  #[Route('/view/{name}/{tab}', name: 'app_game_view', defaults: ['tab' => 'about'])]
  #[ParamConverter('game', options: ['mapping' => ['name' => 'name']])]
  public function view(
    ?Game $game,
    string $tab,
    Request $request,
    CommentRepository $commentRepository,
    PlatformRepository $platformRepository,
    EntityManagerInterface $em,
  ): Response
  {
    if (!$game || (!$game->isPublished() && !$this->isGranted('ROLE_ADMIN'))) {
      $name = $request->attributes->get('name');
      return throw new NotFoundHttpException('Le jeu "'.$name.'" n\'existe pas.');
    }

    $ratingScore = null;

    if ($game->getComments()->count() > 0) {
      foreach ($game->getComments() as $comment) {
        $ratingScore += $comment->getScore();
      }
      $ratingScore /= $game->getComments()->count();
    }

    $options = [
      'game' => $game,
      'tab' => $tab,
      'ratingScore' => $ratingScore
    ];

    if ($this->getUser()) {
      // ADMIN FORMS
      if ($this->isGranted('ROLE_ADMIN')) {
        // FORM PICTURE
        $picture = new Picture();
        $formPicture = $this->createForm(PictureType::class, $picture);
        $formPicture->handleRequest($request);

        if ($formPicture->isSubmitted() && $formPicture->isValid()) {
          $folder = $this->getParameter('game.folder').'/'.$this->getParameter('game.folder.public_path');
          $ext = $picture->getFile()->guessExtension() ?? 'bin';
          $filename = bin2hex(random_bytes(10)) . '.' . $ext;
          $picture->getFile()->move($folder, $filename);
          $picture->setPath($this->getParameter('game.folder.public_path').'/'.$filename);
          $picture->setCreatedAt(new DateTimeImmutable('now'));

          // UPDATE GAME AND FLUSH
          $game->addPicture($picture);
          $em->persist($game);
          $em->flush();

          return $this->redirectToRoute('app_game_view', [
            'name' => $game->getName(),
            'tab' => $tab
          ]);
        }

        // FORM EDIT GAME TITLE AND PLATFORMS
        $formEditGame = $this->createForm(GameType::class, $game);
        $formEditGame->handleRequest($request);

        if ($formEditGame->isSubmitted() && $formEditGame->isValid()) {
          // CLEAR PLATFORM(S)
          for ($i=0; $i < $game->getPlatforms()->count(); $i++) {
            $game->removePlatform($game->getPlatforms()[$i]);
          }

          // ADD SELECTED PLATFORM(S)
          /** @var array<Platform> $platformsSelected */
          $platformsSelected = $platformRepository->findByIds($formEditGame->get('platformsSelected')->getData());
          if (count($platformsSelected)) {
            foreach ($platformsSelected as $platform) {
              $game->addPlatform($platform);
            }
          }

          $em->persist($game);
          $em->flush();

          return $this->redirectToRoute('app_game_view', [
            'name' => $game->getName(),
            'tab' => $tab
          ]);

        }

        $options = [
          ...$options,
          'formPicture' => $formPicture->createView(),
          'formEditGame' => $formEditGame->createView()
        ];
      }

      // FORM RATING
      $comment = $commentRepository->getCommentByUserAndByGame(
        $this->getUser(),
        $game
      ) ?? null;

      if (!$comment) {
        $comment = new Comment();
      }

      $formRating = $this->createForm(CommentType::class, $comment);
      $formRating->handleRequest($request);

      if ($formRating->isSubmitted() && $formRating->isValid()) {

        if (!$comment->getId()) {
          $comment
            ->setUser($this->getUser())
            ->setCreatedAt(new DateTimeImmutable('now'))
          ;
          $game->addComment($comment);
          $em->persist($game);
        } else {
          $comment->setUpdatedAt(new DateTimeImmutable('now'));
          $em->persist($comment);
        }
        $em->flush();

        return $this->redirectToRoute('app_game_view', [
          'name' => $game->getName(),
          'tab' => $tab
        ]);
      }

      $options = [
        ...$options,
        'formComment' => $formRating->createView(),
        'ratingUserValue' => $comment->getId() ? $comment->getScore() : null
      ];
    }

    return $this->render('game/view.html.twig', [
      ...$options
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

    if (!$this->isGranted('ROLE_ADMIN')) {
      return throw new NotFoundHttpException('Oops! Cette page n\'existe pas !');
    }
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
          ->setCreatedAt(new DateTimeImmutable('now'))
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

  #[Route('/{name}/{tab}/picture/delete/{picture}', name: 'app_game_picture_delete', defaults: ['tab' => 'about'])]
  #[ParamConverter('game', options: ['mapping' => ['name' => 'name']])]
  #[IsGranted('IS_AUTHENTICATED_FULLY')]
  #[IsGranted('ROLE_ADMIN')]
  public function pictureDelete(
    ?Game $game,
    string $tab,
    ?Picture $picture,
    EntityManagerInterface $em
  ): Response {
    if (!$game || !$picture) {
      return throw new BadRequestHttpException('Une erreur s\'est produite, veuillez réessayer plus tard.');
    }
//    dd($this->getParameter('game.folder').'/'.$picture->getPath());
    if (file_exists(
      $this->getParameter('game.folder').
      '/'.
      $picture->getPath()))
    {
      unlink(
        $this->getParameter('game.folder').
        '/'.
        $picture->getPath()
      );
    }
    $em->remove($picture);
    $em->flush();

    return $this->redirectToRoute('app_game_view', ['tab' => $tab, 'name' => $game->getName()]);
  }
}
