<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: GameRepository::class)]
#[UniqueEntity('name', 'Le nom du jeu existe déjà.')]
class Game
{
  #[ORM\Id]
  #[ORM\GeneratedValue(strategy: 'CUSTOM')]
  #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
  #[ORM\Column(type: "uuid", unique: true)]
  private ?Uuid $id = null;

  #[ORM\ManyToOne(inversedBy: 'games')]
  #[ORM\JoinColumn(nullable: false)]
  private ?User $author = null;

  #[ORM\Column(length: 255, unique: true)]
  private ?string $name = null;

  #[ORM\Column(type: Types::TEXT)]
  private ?string $description = null;

  #[ORM\Column]
  private ?bool $isPublished = false;

  #[ORM\Column]
  private ?\DateTimeImmutable $createdAt = null;

  #[ORM\Column(nullable: true)]
  private ?\DateTimeImmutable $updatedAt = null;

  #[ORM\OneToMany(mappedBy: 'game', targetEntity: Picture::class, cascade: ['persist', 'remove'])]
  private Collection $pictures;

  #[ORM\OneToMany(mappedBy: 'game', targetEntity: Comment::class, cascade: ['persist', 'remove'])]
  private Collection $comments;

  #[ORM\ManyToMany(targetEntity: Platform::class, mappedBy: 'games')]
  private Collection $platforms;

  public function __construct()
  {
    $this->pictures = new ArrayCollection();
    $this->comments = new ArrayCollection();
    $this->platforms = new ArrayCollection();
  }

  public function getId(): ?Uuid
  {
    return $this->id;
  }

  public function getAuthor(): ?User
  {
    return $this->author;
  }

  public function setAuthor(?User $author): self
  {
    $this->author = $author;

    return $this;
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

  public function getDescription(): ?string
  {
    return $this->description;
  }

  public function setDescription(string $description): self
  {
    $this->description = $description;

    return $this;
  }

  public function isPublished(): ?bool
  {
    return $this->isPublished;
  }

  public function setIsPublished(bool $isPublished): self
  {
    $this->isPublished = $isPublished;

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

  /**
   * @return Collection<int, Picture>
   */
  public function getPictures(): Collection
  {
    return $this->pictures;
  }

  public function addPicture(Picture $picture): self
  {
    if (!$this->pictures->contains($picture)) {
      $this->pictures->add($picture);
      $picture->setGame($this);
    }

    return $this;
  }

  public function removePicture(Picture $picture): self
  {
    if ($this->pictures->removeElement($picture)) {
      // set the owning side to null (unless already changed)
      if ($picture->getGame() === $this) {
        $picture->setGame(null);
      }
    }

    return $this;
  }

  /**
   * @return Collection<int, Comment>
   */
  public function getComments(): Collection
  {
    return $this->comments;
  }

  public function addComment(Comment $comment): self
  {
    if (!$this->comments->contains($comment)) {
      $this->comments->add($comment);
      $comment->setGame($this);
    }

    return $this;
  }

  public function removeComment(Comment $comment): self
  {
    if ($this->comments->removeElement($comment)) {
      // set the owning side to null (unless already changed)
      if ($comment->getGame() === $this) {
        $comment->setGame(null);
      }
    }

    return $this;
  }

  public function getScore(): int {
    $score = 0;
    /** @var Comment $comment */
    foreach ($this->comments as $comment) {
      $score += $comment->getScore();
    }

    return
      $this->comments->count() > 0 ?
      round($score/$this->comments->count(), 0, PHP_ROUND_HALF_DOWN) :
      0;
  }

  /**
   * @return Collection<int, Platform>
   */
  public function getPlatforms(): Collection
  {
    return $this->platforms;
  }

  public function addPlatform(Platform $platform): self
  {
    if (!$this->platforms->contains($platform)) {
      $this->platforms->add($platform);
      $platform->addGame($this);
    }

    return $this;
  }

  public function removePlatform(Platform $platform): self
  {
    if ($this->platforms->removeElement($platform)) {
      $platform->removeGame($this);
    }

    return $this;
  }
}
