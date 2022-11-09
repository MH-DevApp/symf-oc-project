<?php

namespace App\Entity;

use App\Repository\RatingRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Component\Uid\UuidV6;

#[ORM\Entity(repositoryClass: RatingRepository::class)]
class Rating
{
  #[ORM\Id]
  #[ORM\GeneratedValue(strategy: 'CUSTOM')]
  #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
  #[ORM\Column(type: 'uuid', unique: true)]
  private ?UuidV6 $id = null;

  #[ORM\ManyToOne(inversedBy: 'ratings')]
  #[ORM\JoinColumn(nullable: false)]
  private ?User $user = null;

  #[ORM\ManyToOne(inversedBy: 'ratings')]
  #[ORM\JoinColumn(nullable: false)]
  private ?Game $game = null;

  #[ORM\Column]
  private ?int $score = null;

  public function getId(): ?UuidV6
  {
    return $this->id;
  }

  public function getUser(): ?User
  {
    return $this->user;
  }

  public function setUser(?User $user): self
  {
    $this->user = $user;

    return $this;
  }

  public function getGame(): ?Game
  {
    return $this->game;
  }

  public function setGame(?Game $game): self
  {
    $this->game = $game;

    return $this;
  }

  public function getScore(): ?int
  {
    return $this->score;
  }

  public function setScore(int $score): self
  {
    $this->score = $score;

    return $this;
  }
}
