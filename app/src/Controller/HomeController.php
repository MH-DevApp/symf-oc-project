<?php

namespace App\Controller;

use App\Entity\Game;
use App\Form\SearchGameType;
use App\Repository\GameRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
  /**
   * @throws NonUniqueResultException
   * @throws NoResultException
   */
  #[Route('/', name: 'app_home')]
  public function index(
    Request $request,
    GameRepository $gameRepository
  ): Response
  {
    $searchValue = $request->query->get('search') && $request->query->get('search') !== '' ? $request->query->get('search') : "";
    $currentPage = intval($request->query->get('page')) > 0 ? intval($request->query->get('page')) : 1;

    $formSearch = $this->createForm(SearchGameType::class);
    $formSearch->handleRequest($request);

    if ($formSearch->isSubmitted() && $formSearch->isValid()) {
      $searchValue = $formSearch->get('search')->getData() ?? '';
    }

    $limit = 12;
    $totalGame = $gameRepository->getCountGames($searchValue ?? "");
    $maxPage = $totalGame > 0 && floor($totalGame/$limit) > 0 ? floor($totalGame/$limit) + 1 : 1;
    $offset = $currentPage < $maxPage ? ($currentPage-1)*$limit : ($maxPage-1)*$limit;


    /** @var Collection<Game> $games */
    $games = $gameRepository->getGamesByName(
      $searchValue,
      $this->isGranted('ROLE_ADMIN'),
      $limit,
      $offset
    );

    return $this->render('home/index.html.twig', [
      'games' => $games,
      'search' => $searchValue,
      'currentPage' => $currentPage,
      'maxPage' => $maxPage,
      'formSearch' => $formSearch->createView()
    ]);
  }
}
