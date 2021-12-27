<?php

namespace App\Entity;

use App\Repository\TravelActivityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TravelActivityRepository::class)
 */
class TravelActivity
{
   

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $activity_id;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $travel_id;


    public function getActivityId(): ?int
    {
        return $this->activity_id;
    }

    public function setActivityId(int $activity_id): self
    {
        $this->activity_id = $activity_id;

        return $this;
    }

    public function getTravelId(): ?int
    {
        return $this->travel_id;
    }

    public function setTravelId(int $travel_id): self
    {
        $this->travel_id = $travel_id;

        return $this;
    }
}
