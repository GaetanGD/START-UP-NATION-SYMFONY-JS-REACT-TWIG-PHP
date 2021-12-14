<?php

namespace App\Entity;

use App\Repository\TravelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TravelRepository::class)
 */
class Travel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $main_picture;

    /**
     * @ORM\ManyToMany(targetEntity=Activity::class, inversedBy="yes")
     */
    private $activity;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="travel")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_id;

    /**
     * @ORM\OneToMany(targetEntity=Picture::class, mappedBy="travel")
     */
    private $pictures;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $advice;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $top_restaurant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $top_activity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $top_accommodation;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $equipment;

    /**
     * @ORM\Column(type="boolean")
     */
    private $transport;

    /**
     * @ORM\Column(type="integer")
     */
    private $weather_report;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    public function __construct()
    {
        $this->activity = new ArrayCollection();
        $this->pictures = new ArrayCollection();
    }

    public function getId(): ?int
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

    public function getMainPicture(): ?string
    {
        return $this->main_picture;
    }

    public function setMainPicture(string $main_picture): self
    {
        $this->main_picture = $main_picture;

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
        }

        return $this;
    }

    public function removeActivity(Activity $activity): self
    {
        $this->activity->removeElement($activity);

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * @return Collection|Picture[]
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(Picture $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            $picture->setTravel($this);
        }

        return $this;
    }

    public function removePicture(Picture $picture): self
    {
        if ($this->pictures->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getTravel() === $this) {
                $picture->setTravel(null);
            }
        }

        return $this;
    }

    public function getAdvice(): ?string
    {
        return $this->advice;
    }

    public function setAdvice(?string $advice): self
    {
        $this->advice = $advice;

        return $this;
    }

    public function getTopRestaurant(): ?string
    {
        return $this->top_restaurant;
    }

    public function setTopRestaurant(?string $top_restaurant): self
    {
        $this->top_restaurant = $top_restaurant;

        return $this;
    }

    public function getTopActivity(): ?string
    {
        return $this->top_activity;
    }

    public function setTopActivity(?string $top_activity): self
    {
        $this->top_activity = $top_activity;

        return $this;
    }

    public function getTopAccommodation(): ?string
    {
        return $this->top_accommodation;
    }

    public function setTopAccommodation(?string $top_accommodation): self
    {
        $this->top_accommodation = $top_accommodation;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getEquipment(): ?string
    {
        return $this->equipment;
    }

    public function setEquipment(string $equipment): self
    {
        $this->equipment = $equipment;

        return $this;
    }

    public function getTransport(): ?bool
    {
        return $this->transport;
    }

    public function setTransport(bool $transport): self
    {
        $this->transport = $transport;

        return $this;
    }

    public function getWeatherReport(): ?int
    {
        return $this->weather_report;
    }

    public function setWeatherReport(int $weather_report): self
    {
        $this->weather_report = $weather_report;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
