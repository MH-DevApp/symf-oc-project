<?php

namespace App\DataFixtures;

use App\DataFixtures\MockData\MockDataRating;
use App\Entity\Comment;
use App\Entity\Game;
use App\Entity\User;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Exception;

class RatingFixtures extends Fixture implements DependentFixtureInterface
{
  /**
   * @throws Exception
   */
  public function load(ObjectManager $manager): void
    {
      /** @var User[] $usersDatas */
      $usersDatas = $manager->getRepository(User::class)->findAll();
      /** @var Game[] $gamesDatas */
      $gamesDatas = $manager->getRepository(Game::class)->findAll();

      $ratingsDatas = MockDataRating::getDatasRating();

      foreach($gamesDatas as $game) {
        $nbComment = rand(6, 30);
        for ($i=0; $i < $nbComment; $i++) {
          $user = $usersDatas[rand(0, (count($usersDatas)-1))];
          while(count(array_filter($game->getComments()->toArray(), function($c) use ($user) {
            return $c->getUser()->getPseudo() === $user->getPseudo() || $user->getPseudo() === 'Admin';
          })) > 0) {
            $user = $usersDatas[rand(0, count($usersDatas)-1)];
          }
          $score = rand(1, 5);
          $comment = (new Comment())
            ->setUser($user)
            ->setCreatedAt(new DateTimeImmutable(sprintf('-%d days', rand(1, 365))))
            ->setScore($score)
            ->setContent($ratingsDatas[$score-1][rand(0, count($ratingsDatas[$score-1])-1)]);

          $game->addComment($comment);
        }
        $manager->persist($game);
        $manager->flush();
      }
    }

    public function getDependencies(): array
    {
      return [
        UserFixtures::class,
        GameFixtures::class
      ];
    }
}
