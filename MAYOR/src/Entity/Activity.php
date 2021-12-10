<?php

namespace App\Entity;

use App\Repository\ActivityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActivityRepository::class)
 */
class Activity
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
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $equipment;

    /**
     * @ORM\Column(type="boolean")
     */
    private $reservation;

    /**
     * @ORM\Column(type="integer")
     */
    private $atmosphere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $country;

    /**
     * @ORM\Column(type="integer")
     */
    private $postal_code;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $state;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address_1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address_2;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $strong_point;

    /**
     * @ORM\Column(type="text")
     */
    private $weak_point;

    /**
     * @ORM\Column(type="date")
     */
    private $calendar;

    /**
     * @ORM\ManyToMany(targetEntity=Travel::class, mappedBy="activity")
     */
    private $yes;

    /**
     * @ORM\OneToMany(targetEntity=Hourly::class, mappedBy="activity")
     */
    private $hourlies;

    public function __construct()
    {
        $this->yes = new ArrayCollection();
        $this->hourlies = new ArrayCollection();
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

    public function setEquipment(?string $equipment): self
    {
        $this->equipment = $equipment;

        return $this;
    }

    public function getReservation(): ?bool
    {
        return $this->reservation;
    }

    public function setReservation(bool $reservation): self
    {
        $this->reservation = $reservation;

        return $this;
    }

    public function getAtmosphere(): ?int
    {
        return $this->atmosphere;
    }

    public function setAtmosphere(int $atmosphere): self
    {
        $this->atmosphere = $atmosphere;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getPostalCode(): ?int
    {
        return $this->postal_code;
    }

    public function setPostalCode(int $postal_code): self
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAddress1(): ?string
    {
        return $this->address_1;
    }

    public function setAddress1(string $address_1): self
    {
        $this->address_1 = $address_1;

        return $this;
    }

    public function getAddress2(): ?string
    {
        return $this->address_2;
    }

    public function setAddress2(?string $address_2): self
    {
        $this->address_2 = $address_2;

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

    public function getStrongPoint(): ?string
    {
        return $this->strong_point;
    }

    public function setStrongPoint(string $strong_point): self
    {
        $this->strong_point = $strong_point;

        return $this;
    }

    public function getWeakPoint(): ?string
    {
        return $this->weak_point;
    }

    public function setWeakPoint(string $weak_point): self
    {
        $this->weak_point = $weak_point;

        return $this;
    }

    public function getCalendar(): ?\DateTimeInterface
    {
        return $this->calendar;
    }

    public function setCalendar(\DateTimeInterface $calendar): self
    {
        $this->calendar = $calendar;

        return $this;
    }

    /**
     * @return Collection|Travel[]
     */
    public function getYes(): Collection
    {
        return $this->yes;
    }

    public function addYe(Travel $ye): self
    {
        if (!$this->yes->contains($ye)) {
            $this->yes[] = $ye;
            $ye->addActivity($this);
        }

        return $this;
    }

    public function removeYe(Travel $ye): self
    {
        if ($this->yes->removeElement($ye)) {
            $ye->removeActivity($this);
        }

        return $this;
    }

    /**
     * @return Collection|Hourly[]
     */
    public function getHourlies(): Collection
    {
        return $this->hourlies;
    }

    public function addHourly(Hourly $hourly): self
    {
        if (!$this->hourlies->contains($hourly)) {
            $this->hourlies[] = $hourly;
            $hourly->setActivity($this);
        }

        return $this;
    }

    public function removeHourly(Hourly $hourly): self
    {
        if ($this->hourlies->removeElement($hourly)) {
            // set the owning side to null (unless already changed)
            if ($hourly->getActivity() === $this) {
                $hourly->setActivity(null);
            }
        }

        return $this;
    }
}
