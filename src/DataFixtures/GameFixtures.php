<?php

namespace App\DataFixtures;

use App\DataFixtures\MockData\MockDataGame;
use App\DataFixtures\Utils\FileService;
use App\Entity\Game;
use App\Entity\Picture;
use App\Entity\Platform;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Exception;

class GameFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
      /** @var User[] $usersDatas */
      $usersDatas = $manager->getRepository(User::class)->findAll();
      /** @var Platform[] $platformsDatas */
      $platformsDatas = $manager->getRepository(Platform::class)->findAll();

      $author = array_filter($usersDatas, function($u) { return $u->getPseudo() === "Admin"; });

      try {
        for ($n=0; $n<5; $n++) {
          $gamesData = MockDataGame::getDatasGame();
          foreach ($gamesData as $gameData) {

            $game = (new Game())
              ->setAuthor($author[0])
              ->setIsPublished(true)
              ->setName($gameData['name'].'-'.$n)
              ->setDescription($gameData["description"])
              ->setCreatedAt($gameData['createdAt'])
            ;

            // Platforms
            foreach ($platformsDatas as $platform) {
              if (in_array($platform->getName(), $gameData['platforms'])) {
                $game->addPlatform($platform);
              }
            }

            // Picture
            for ($i=0; $i<$gameData['nbPictures']; $i++) {
              $path = FileService::moveFileToDir(
                'images/games',
                $gameData['name'].'/img'.$i.'.png'
              );
              $picture = (new Picture())
                ->setCreatedAt($gameData['createdAt'])
                ->setPath($path);

              $game->addPicture($picture);
            }

            $manager->persist($game);
            $manager->flush();
          }
        }
      } catch (Exception $e) {
        dump($e);
      }
    }

    public function getDependencies(): array
    {
      return [
        UserFixtures::class,
        PlatformFixtures::class
      ];
    }
}
