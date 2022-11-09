<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
  public function __construct(private UserPasswordHasherInterface $hasher){}

  public function load(ObjectManager $manager): void
  {
    $user = (new User())
      ->setCreatedAt(new \DateTimeImmutable('now'))
      ->setEmail('test@test.com')
      ->setPseudo('Test');

    $hash = $this->hasher->hashPassword($user, '123123');
    $user->setPassword($hash);

    $manager->persist($user);
    $manager->flush();
  }
}
