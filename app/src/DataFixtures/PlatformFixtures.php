<?php

namespace App\DataFixtures;

use App\Entity\Picture;
use App\Entity\Platform;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PlatformFixtures extends Fixture
{
  public function load(ObjectManager $manager): void
  {
    $pathImg = '/images/platforms/';
    $platforms = [
      'nintendo' => $pathImg.'nintendo.png',
      'pc' => $pathImg.'pc.png',
      'playstation' => $pathImg.'ps.png',
      'xbox' => $pathImg.'xbox.png'
    ];

    foreach ($platforms as $name => $path) {
      $picture = (new Picture())
        ->setCreatedAt(new \DateTimeImmutable('now'))
        ->setPath($path);

      $platform = (new Platform())
        ->setName($name)
        ->setPicture($picture);

      $manager->persist($platform);
      $manager->flush();
    }

    $manager->flush();
  }
}
