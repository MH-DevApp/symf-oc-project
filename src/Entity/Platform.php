<?php

namespace App\Entity;

use App\Repository\PlatformRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Uid\UuidV6;

#[ORM\Entity(repositoryClass: PlatformRepository::class)]
#[UniqueEntity('name', 'La plateforme existe déjà.')]
class Platform
{
  #[ORM\Id]
  #[ORM\GeneratedValue(strategy: 'CUSTOM')]
  #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
  #[ORM\Column(type: 'uuid', unique: true)]
  private ?UuidV6 $id = null;

  #[ORM\Column(length: 255, unique: true)]
  private ?string $name = null;

  #[ORM\ManyToMany(targetEntity: Game::class, inversedBy: 'platforms')]
  private Collection $games;

  #[ORM\OneToMany(mappedBy: 'platform', targetEntity: User::class)]
  private Collection $users;

  #[ORM\OneToOne(mappedBy: 'platform', cascade: ['persist'])]
  private ?Picture $picture = null;

  public function __construct()
  {
    $this->games = new ArrayCollection();
    $this->users = new ArrayCollection();
  }

  public function getId(): ?UuidV6
  {
    return $this->id;
  }

  public function getName(): ?string
  {
    return $this->name;
  }

  public function setName(string $name): self
  {
    $this->name = $name;

    return $this;
  }

  /**
   * @return Collection<int, Game>
   */
  public function getGames(): Collection
  {
    return $this->games;
  }

  public function addGame(Game $game): self
  {
    if (!$this->games->contains($game)) {
      $this->games->add($game);
    }

    return $this;
  }

  public function removeGame(Game $game): self
  {
    $this->games->removeElement($game);

    return $this;
  }

  /**
   * @return Collection<int, User>
   */
  public function getUsers(): Collection
  {
    return $this->users;
  }

  public function addUser(User $user): self
  {
    if (!$this->users->contains($user)) {
      $this->users->add($user);
      $user->setPlatform($this);
    }

    return $this;
  }

  public function removeUser(User $user): self
  {
    if ($this->users->removeElement($user)) {
      // set the owning side to null (unless already changed)
      if ($user->getPlatform() === $this) {
        $user->setPlatform(null);
      }
    }

    return $this;
  }

  public function getPicture(): ?Picture {
    return $this->picture;
  }

  public function setPicture(?Picture $picture): self {
    $this->picture = $picture;
    if ($picture->getPlatform() !== $this) {
      $picture->setPlatform($this);
    }
    return $this;
  }
}
