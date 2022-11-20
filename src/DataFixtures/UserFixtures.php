<?php

namespace App\DataFixtures;

use App\Entity\User;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
  public function __construct(private UserPasswordHasherInterface $hasher){}

  /**
   * @throws \Exception
   */
  public function load(ObjectManager $manager): void
  {

    for($i=0;$i<101;$i++) {

      if ($i === 0) {
        $user = (new User())
          ->setCreatedAt(new DateTimeImmutable(sprintf('-%d days', rand(1, (365*4)))))
          ->setEmail('admin@test.com')
          ->setRoles(['ROLE_ADMIN'])
          ->setPseudo('Admin');
      } else {
        $user = (new User())
          ->setCreatedAt(new DateTimeImmutable(sprintf('-%d days', rand(1, (365*4)))))
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
