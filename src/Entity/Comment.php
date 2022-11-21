<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Component\Uid\UuidV6;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Contracts\Service\Attribute\Required;

#[ORM\Entity(repositoryClass: CommentRepository::class)]
class Comment
{
  #[ORM\Id]
  #[ORM\GeneratedValue(strategy: 'CUSTOM')]
  #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
  #[ORM\Column(type: "uuid", unique: true)]
  private ?UuidV6 $id = null;

  #[ORM\ManyToOne(inversedBy: 'comments')]
  #[ORM\JoinColumn(nullable: false)]
  private ?User $user = null;

  #[ORM\ManyToOne(inversedBy: 'comments')]
  #[ORM\JoinColumn(nullable: false)]
  private ?Game $game = null;

  #[ORM\Column(type: Types::TEXT)]
  #[NotBlank(message: 'Le message ne peut pas être vide.')]
  #[Required]
  private ?string $content = null;

  #[ORM\Column]
  #[Length(
    min: 1,
    max: 5,
    minMessage: 'Une erreur s\'est produite lors du vote, veuillez réessayer à nouveau.',
    maxMessage: 'Une erreur s\'est produite lors du vote, veuillez réessayer à nouveau.'
  )]
  private ?int $score = 1;

  #[ORM\Column]
  private ?\DateTimeImmutable $createdAt = null;

  #[ORM\Column(nullable: true)]
  private ?\DateTimeImmutable $updatedAt = null;

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

  public function getContent(): ?string
  {
    return $this->content;
  }

  public function setContent(string $content): self
  {
    $this->content = $content;

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

  public function getCreatedAt(): ?\DateTimeImmutable
  {
    return $this->createdAt;
  }

  public function setCreatedAt(\DateTimeImmutable $createdAt): self
  {
    $this->createdAt = $createdAt;

    return $this;
  }

  public function getUpdatedAt(): ?\DateTimeImmutable
  {
    return $this->updatedAt;
  }

  public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
  {
    $this->updatedAt = $updatedAt;

    return $this;
  }
}
