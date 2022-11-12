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

    for($i=0;$i<10;$i++) {

      if ($i === 0) {
        $user = (new User())
          ->setCreatedAt(new \DateTimeImmutable('now'))
          ->setEmail('admin@test.com')
          ->setRoles(['ROLE_ADMIN'])
          ->setPseudo('Admin');
      } else {
        $user = (new User())
          ->setCreatedAt(new \DateTimeImmutable('now'))
          ->setEmail('user'.$i.'@test.com')
          ->setPseudo('User'.$i);
      }

      $hash = $this->hasher->hashPassword($user, '123123');
      $user->setPassword($hash);

      $manager->persist($user);
    }
    $manager->flush();
  }
}
