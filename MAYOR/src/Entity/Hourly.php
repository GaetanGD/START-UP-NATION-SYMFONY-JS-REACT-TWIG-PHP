<?php

namespace App\Entity;

use App\Repository\HourlyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HourlyRepository::class)
 */
class Hourly
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $opening_time_monday;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $closure_time_monday;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $opening_time_tuesday;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $closure_time_tuesday;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $opening_time_wednesday;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $closure_time_wednesday;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $opening_time_thursday;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $closure_time_thursday;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $opening_time_friday;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $closure_time_friday;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $opening_time_saturday;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $closure_time_saturday;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $opening_time_sunday;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $closure_time_sunday;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOpeningTimeMonday(): ?\DateTimeInterface
    {
        return $this->opening_time_monday;
    }

    public function setOpeningTimeMonday(?\DateTimeInterface $opening_time_monday): self
    {
        $this->opening_time_monday = $opening_time_monday;

        return $this;
    }

    public function getClosureTimeMonday(): ?\DateTimeInterface
    {
        return $this->closure_time_monday;
    }

    public function setClosureTimeMonday(?\DateTimeInterface $closure_time_monday): self
    {
        $this->closure_time_monday = $closure_time_monday;

        return $this;
    }

    public function getOpeningTimeTuesday(): ?\DateTimeInterface
    {
        return $this->opening_time_tuesday;
    }

    public function setOpeningTimeTuesday(?\DateTimeInterface $opening_time_tuesday): self
    {
        $this->opening_time_tuesday = $opening_time_tuesday;

        return $this;
    }

    public function getClosureTimeTuesday(): ?\DateTimeInterface
    {
        return $this->closure_time_tuesday;
    }

    public function setClosureTimeTuesday(?\DateTimeInterface $closure_time_tuesday): self
    {
        $this->closure_time_tuesday = $closure_time_tuesday;

        return $this;
    }

    public function getOpeningTimeWednesday(): ?\DateTimeInterface
    {
        return $this->opening_time_wednesday;
    }

    public function setOpeningTimeWednesday(?\DateTimeInterface $opening_time_wednesday): self
    {
        $this->opening_time_wednesday = $opening_time_wednesday;

        return $this;
    }

    public function getClosureTimeWednesday(): ?\DateTimeInterface
    {
        return $this->closure_time_wednesday;
    }

    public function setClosureTimeWednesday(?\DateTimeInterface $closure_time_wednesday): self
    {
        $this->closure_time_wednesday = $closure_time_wednesday;

        return $this;
    }

    public function getOpeningTimeThursday(): ?\DateTimeInterface
    {
        return $this->opening_time_thursday;
    }

    public function setOpeningTimeThursday(?\DateTimeInterface $opening_time_thursday): self
    {
        $this->opening_time_thursday = $opening_time_thursday;

        return $this;
    }

    public function getClosureTimeThursday(): ?\DateTimeInterface
    {
        return $this->closure_time_thursday;
    }

    public function setClosureTimeThursday(?\DateTimeInterface $closure_time_thursday): self
    {
        $this->closure_time_thursday = $closure_time_thursday;

        return $this;
    }

    public function getOpeningTimeFriday(): ?\DateTimeInterface
    {
        return $this->opening_time_friday;
    }

    public function setOpeningTimeFriday(?\DateTimeInterface $opening_time_friday): self
    {
        $this->opening_time_friday = $opening_time_friday;

        return $this;
    }

    public function getClosureTimeFriday(): ?\DateTimeInterface
    {
        return $this->closure_time_friday;
    }

    public function setClosureTimeFriday(?\DateTimeInterface $closure_time_friday): self
    {
        $this->closure_time_friday = $closure_time_friday;

        return $this;
    }

    public function getOpeningTimeSaturday(): ?\DateTimeInterface
    {
        return $this->opening_time_saturday;
    }

    public function setOpeningTimeSaturday(?\DateTimeInterface $opening_time_saturday): self
    {
        $this->opening_time_saturday = $opening_time_saturday;

        return $this;
    }

    public function getClosureTimeSaturday(): ?\DateTimeInterface
    {
        return $this->closure_time_saturday;
    }

    public function setClosureTimeSaturday(?\DateTimeInterface $closure_time_saturday): self
    {
        $this->closure_time_saturday = $closure_time_saturday;

        return $this;
    }

    public function getOpeningTimeSunday(): ?\DateTimeInterface
    {
        return $this->opening_time_sunday;
    }

    public function setOpeningTimeSunday(?\DateTimeInterface $opening_time_sunday): self
    {
        $this->opening_time_sunday = $opening_time_sunday;

        return $this;
    }

    public function getClosureTimeSunday(): ?\DateTimeInterface
    {
        return $this->closure_time_sunday;
    }

    public function setClosureTimeSunday(?\DateTimeInterface $closure_time_sunday): self
    {
        $this->closure_time_sunday = $closure_time_sunday;

        return $this;
    }
}
