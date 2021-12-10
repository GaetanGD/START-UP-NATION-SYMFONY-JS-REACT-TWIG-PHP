<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

Class Travel_activity 
{
    /**
     *  @ORM/Column(type="integer")
     */

     private $travel_id;

      /**
     *  @ORM/Column(type="integer")
     */

     private $activity_id;

    public function setActivity_id($activityId){
        $this-> $activity_id = $activityId;
    }

    public function setTravel_id($travelId){
        $this-> $travel_id = $travelId;
    }
    
}