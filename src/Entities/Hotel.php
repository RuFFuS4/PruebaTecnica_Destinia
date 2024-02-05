<?php

require_once 'Accommodation.php';

class Hotel extends Accommodation {
    private $stars;
    private $roomType;

    public function __construct($name, $location, $stars, $roomType) {
        parent::__construct($name, $location);
        $this->stars = $stars;
        $this->roomType = $roomType;
    }

    /**
     * Get the value of roomType
     */ 
    public function getRoomType()
    {
        return $this->roomType;
    }

    /**
     * Set the value of roomType
     *
     * @return  self
     */ 
    public function setRoomType($roomType)
    {
        $this->roomType = $roomType;

        return $this;
    }

    /**
     * Get the value of stars
     */ 
    public function getStars()
    {
        return $this->stars;
    }

    /**
     * Set the value of stars
     *
     * @return  self
     */ 
    public function setStars($stars)
    {
        $this->stars = $stars;

        return $this;
    }
}
