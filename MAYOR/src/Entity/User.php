<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="boolean")
     */
    private $newsletter;

    /**
     * @ORM\Column(type="datetime")
     */
    private $cgu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $user_picture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $certification;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $about;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $budget;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $temperature;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duration;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $favorite_food;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $geographical_area;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $means_of_locomotion;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $difficulty_level;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $accompaniement;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $comfort;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $environment;

    /**
     * @ORM\OneToMany(targetEntity=Travel::class, mappedBy="user_id")
     */
    private $travel;

    /**
     * @ORM\OneToMany(targetEntity=Activity::class, mappedBy="user_id")
     */
    private $activity;

    public function __construct()
    {
        $this->travel = new ArrayCollection();
        $this->activity = new ArrayCollection();
    }

    public function getId(): ?int
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
     * @see UserInterface
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

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getNewsletter(): ?bool
    {
        return $this->newsletter;
    }

    public function setNewsletter(bool $newsletter): self
    {
        $this->newsletter = $newsletter;

        return $this;
    }

    public function getCgu(): ?\DateTimeInterface
    {
        return $this->cgu;
    }

    public function setCgu(\DateTimeInterface $cgu): self
    {
        $this->cgu = $cgu;

        return $this;
    }

    public function getUserPicture(): ?string
    {
        return $this->user_picture;
    }

    public function setUserPicture(?string $user_picture): self
    {
        $this->user_picture = $user_picture;

        return $this;
    }

    public function getCertification(): ?string
    {
        return $this->certification;
    }

    public function setCertification(?string $certification): self
    {
        $this->certification = $certification;

        return $this;
    }

    public function getAbout(): ?string
    {
        return $this->about;
    }

    public function setAbout(?string $about): self
    {
        $this->about = $about;

        return $this;
    }

    public function getBudget(): ?int
    {
        return $this->budget;
    }

    public function setBudget(?int $budget): self
    {
        $this->budget = $budget;

        return $this;
    }

    public function getTemperature(): ?int
    {
        return $this->temperature;
    }

    public function setTemperature(?int $temperature): self
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getFavoriteFood(): ?string
    {
        return $this->favorite_food;
    }

    public function setFavoriteFood(?string $favorite_food): self
    {
        $this->favorite_food = $favorite_food;

        return $this;
    }

    public function getGeographicalArea(): ?string
    {
        return $this->geographical_area;
    }

    public function setGeographicalArea(?string $geographical_area): self
    {
        $this->geographical_area = $geographical_area;

        return $this;
    }

    public function getMeansOfLocomotion(): ?string
    {
        return $this->means_of_locomotion;
    }

    public function setMeansOfLocomotion(?string $means_of_locomotion): self
    {
        $this->means_of_locomotion = $means_of_locomotion;

        return $this;
    }

    public function getDifficultyLevel(): ?int
    {
        return $this->difficulty_level;
    }

    public function setDifficultyLevel(?int $difficulty_level): self
    {
        $this->difficulty_level = $difficulty_level;

        return $this;
    }

    public function getAccompaniement(): ?string
    {
        return $this->accompaniement;
    }

    public function setAccompaniement(?string $accompaniement): self
    {
        $this->accompaniement = $accompaniement;

        return $this;
    }

    public function getComfort(): ?int
    {
        return $this->comfort;
    }

    public function setComfort(?int $comfort): self
    {
        $this->comfort = $comfort;

        return $this;
    }

    public function getEnvironment(): ?int
    {
        return $this->environment;
    }

    public function setEnvironment(?int $environment): self
    {
        $this->environment = $environment;

        return $this;
    }

    /**
     * @return Collection|Travel[]
     */
    public function getTravel(): Collection
    {
        return $this->travel;
    }

    public function addTravel(Travel $travel): self
    {
        if (!$this->travel->contains($travel)) {
            $this->travel[] = $travel;
            $travel->setUserId($this);
        }

        return $this;
    }

    public function removeTravel(Travel $travel): self
    {
        if ($this->travel->removeElement($travel)) {
            // set the owning side to null (unless already changed)
            if ($travel->getUserId() === $this) {
                $travel->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Activity[]
     */
    public function getActivity(): Collection
    {
        return $this->activity;
    }

    public function addActivity(Activity $activity): self
    {
        if (!$this->activity->contains($activity)) {
            $this->activity[] = $activity;
            $activity->setUserId($this);
        }

        return $this;
    }

    public function removeActivity(Activity $activity): self
    {
        if ($this->activity->removeElement($activity)) {
            // set the owning side to null (unless already changed)
            if ($activity->getUserId() === $this) {
                $activity->setUserId(null);
            }
        }

        return $this;
    }
}
