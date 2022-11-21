<?php

namespace App\Entity;

use App\Repository\PictureRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Uid\UuidV6;

#[ORM\Entity(repositoryClass: PictureRepository::class)]
class Picture
{
  #[ORM\Id]
  #[ORM\GeneratedValue(strategy: 'CUSTOM')]
  #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
  #[ORM\Column(type: "uuid", unique: true)]
  private ?UuidV6 $id = null;

  #[ORM\ManyToOne(inversedBy: 'pictures')]
  private ?Game $game = null;

  #[ORM\OneToOne(inversedBy: 'picture', cascade: ['persist', 'remove'])]
  private ?User $user = null;

  #[ORM\OneToOne(inversedBy: 'picture', cascade: ['persist', 'remove'])]
  private ?Platform $platform = null;

  #[ORM\Column(length: 255)]
  private ?string $path = null;

  private ?File $file = null;

  #[ORM\Column]
  private ?\DateTimeImmutable $createdAt = null;

  public function getId(): ?UuidV6
  {
    return $this->id;
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

  public function getUser(): ?User
  {
    return $this->user;
  }

  public function setUser(?User $user): self
  {
    $this->user = $user;

    return $this;
  }

  public function getPlatform(): ?Platform
  {
    return $this->platform;
  }

  public function setPlatform(?Platform $platform): self
  {
    $this->platform = $platform;

    if ($platform->getPicture() !== $this) {
      $platform->setPicture($this);
    }

    return $this;
  }

  public function getPath(): ?string
  {
    return $this->path;
  }

  public function setPath(string $path): self
  {
    $this->path = $path;

    return $this;
  }

  public function getFile(): ?File
  {
    return $this->file;
  }

  public function setFile(?File $file): self
  {
    $this->file = $file;

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
}
