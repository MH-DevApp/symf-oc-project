<?php

namespace App\Controller;

use App\Form\SearchGameType;
use App\Form\SearchType;
use App\Repository\GameRepository;
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
    $limit = 12;
    $totalGame = $gameRepository->getCountGames();
    $maxPage = $totalGame > 0 && round($totalGame/$limit, 0, PHP_ROUND_HALF_UP) > 0 ? round($totalGame/$limit, 0, PHP_ROUND_HALF_DOWN) + 1 : 1;
    $currentPage = intval($request->query->get('page')) > 0 ? intval($request->query->get('page')) : 1;
    $offset = $currentPage < $maxPage ? ($currentPage-1)*$limit : ($maxPage-1)*$limit;

    $games = $gameRepository->findBy(
      $this->isGranted('ROLE_ADMIN') ? [] : ['isPublished' => true],
      [],
      $limit,
      $offset
    );

    $formSearch = $this->createForm(SearchGameType::class);
    $formSearch->handleRequest($request);

    if ($formSearch->isSubmitted() && $formSearch->isValid()) {
      dump($formSearch->get('search')->getData());
    }

    return $this->render('home/index.html.twig', [
      'games' => $games,
      'currentPage' => $currentPage,
      'maxPage' => $maxPage,
      'formSearch' => $formSearch->createView()
    ]);
  }
}
