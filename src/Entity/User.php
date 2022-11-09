<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Uid\UuidV6;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity('email', 'L\'email existe déjà.')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
  #[ORM\Id]
  #[ORM\GeneratedValue(strategy: "CUSTOM")]
  #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
  #[ORM\Column(type: 'uuid', unique: true)]
  private ?UuidV6 $id = null;

  #[ORM\Column(length: 180, unique: true)]
  private ?string $email = null;

  #[ORM\Column]
  private array $roles = [];

  /**
   * @var string The hashed password
   */
  #[ORM\Column]
  private ?string $password = null;

  #[ORM\Column(length: 255, unique: true)]
  private ?string $pseudo = null;

  #[ORM\Column]
  private ?\DateTimeImmutable $createdAt = null;

  #[ORM\Column(length: 255, nullable: true)]
  private ?string $tokenForgottenPassword = null;

  #[ORM\Column(nullable: true)]
  private ?\DateTimeImmutable $tokenForgottenPasswordExpiredAt = null;

  #[ORM\Column]
  private ?bool $isActive = true;

  #[ORM\OneToMany(mappedBy: 'author', targetEntity: Game::class)]
  private Collection $games;

  #[ORM\OneToOne(mappedBy: 'user', cascade: ['persist', 'remove'])]
  private ?Picture $picture = null;

  #[ORM\OneToMany(mappedBy: 'user', targetEntity: Comment::class)]
  private Collection $comments;

  #[ORM\OneToMany(mappedBy: 'user', targetEntity: Rating::class)]
  private Collection $ratings;

  #[ORM\ManyToOne(inversedBy: 'users')]
  private ?Platform $platform = null;

  public function __construct()
  {
    $this->games = new ArrayCollection();
    $this->comments = new ArrayCollection();
    $this->ratings = new ArrayCollection();
  }

  public function getId(): ?UuidV6
  {
    return $this->id;
  }

  public function getEmail(): ?string
  {
    return $this->email;
  }

  public function setEmail(string $email): self
  {
    $this->email = $email;

    return $this;
  }

  /**
   * A visual identifier that represents this user.
   *
   * @see UserInterface
   */
  public function getUserIdentifier(): string
  {
    return (string) $this->email;
  }

  /**
   * @deprecated since Symfony 5.3, use getUserIdentifier instead
   */
  public function getUsername(): string
  {
    return (string) $this->email;
  }

  /**
   * @see UserInterface
   */
  public function getRoles(): array
  {
    $roles = $this->roles;
    // guarantee every user at least has ROLE_USER
    $roles[] = 'ROLE_USER';

    return array_unique($roles);
  }

  public function setRoles(array $roles): self
  {
    $this->roles = $roles;

    return $this;
  }

  /**
   * @see PasswordAuthenticatedUserInterface
   */
  public function getPassword(): string
  {
    return $this->password;
  }

  public function setPassword(string $password): self
  {
    $this->password = $password;

    return $this;
  }

  /**
   * Returning a salt is only needed, if you are not using a modern
   * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
   *
   * @see UserInterface
   */
  public function getSalt(): ?string
  {
    return null;
  }

  /**
   * @see UserInterface
   */
  public function eraseCredentials()
  {
    // If you store any temporary, sensitive data on the user, clear it here
    // $this->plainPassword = null;
  }

  public function getPseudo(): ?string
  {
    return $this->pseudo;
  }

  public function setPseudo(string $pseudo): self
  {
    $this->pseudo = $pseudo;

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

  public function getTokenForgottenPassword(): ?string
  {
    return $this->tokenForgottenPassword;
  }

  public function setTokenForgottenPassword(?string $tokenForgottenPassword): self
  {
    $this->tokenForgottenPassword = $tokenForgottenPassword;

    return $this;
  }

  public function getTokenForgottenPasswordExpiredAt(): ?\DateTimeImmutable
  {
    return $this->tokenForgottenPasswordExpiredAt;
  }

  public function setTokenForgottenPasswordExpiredAt(?\DateTimeImmutable $tokenForgottenPasswordExpiredAt): self
  {
    $this->tokenForgottenPasswordExpiredAt = $tokenForgottenPasswordExpiredAt;

    return $this;
  }

  public function isActive(): ?bool
  {
    return $this->isActive;
  }

  public function setIsActive(bool $isActive): self
  {
    $this->isActive = $isActive;

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
      $game->setAuthor($this);
    }

    return $this;
  }

  public function removeGame(Game $game): self
  {
    if ($this->games->removeElement($game)) {
      // set the owning side to null (unless already changed)
      if ($game->getAuthor() === $this) {
        $game->setAuthor(null);
      }
    }

    return $this;
  }

  public function getPicture(): ?Picture
  {
      return $this->picture;
  }

  public function setPicture(?Picture $picture): self
  {
    // unset the owning side of the relation if necessary
    if ($picture === null && $this->picture !== null) {
      $this->picture->setUser(null);
    }

    // set the owning side of the relation if necessary
    if ($picture !== null && $picture->getUser() !== $this) {
      $picture->setUser($this);
    }

    $this->picture = $picture;

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
      $comment->setUser($this);
    }

    return $this;
  }

  public function removeComment(Comment $comment): self
  {
    if ($this->comments->removeElement($comment)) {
      // set the owning side to null (unless already changed)
      if ($comment->getUser() === $this) {
        $comment->setUser(null);
      }
    }

    return $this;
  }

  /**
   * @return Collection<int, Rating>
   */
  public function getRatings(): Collection
  {
    return $this->ratings;
  }

  public function addRating(Rating $rating): self
  {
    if (!$this->ratings->contains($rating)) {
      $this->ratings->add($rating);
      $rating->setUser($this);
    }

    return $this;
  }

  public function removeRating(Rating $rating): self
  {
    if ($this->ratings->removeElement($rating)) {
      // set the owning side to null (unless already changed)
      if ($rating->getUser() === $this) {
          $rating->setUser(null);
      }
    }

    return $this;
  }

  public function getPlatform(): ?Platform
  {
    return $this->platform;
  }

  public function setPlatform(?Platform $platform): self
  {
    $this->platform = $platform;

    return $this;
  }
}
