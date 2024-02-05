<?php

require_once 'Accommodation.php';

class Apartment extends Accommodation {
    private $numberOfApartments;
    private $capacityAdults;
    private $capacityChildren;

    public function __construct($name, $location, $numberOfApartments, $capacityAdults, $capacityChildren) {
        parent::__construct($name, $location);
        $this->numberOfApartments = $numberOfApartments;
        $this->capacityAdults = $capacityAdults;
        $this->capacityChildren = $capacityChildren;
    }

    /**
     * Get the value of numberOfApartments
     */ 
    public function getNumberOfApartments()
    {
        return $this->numberOfApartments;
    }

    /**
     * Set the value of numberOfApartments
     *
     * @return  self
     */ 
    public function setNumberOfApartments($numberOfApartments)
    {
        $this->numberOfApartments = $numberOfApartments;

        return $this;
    }

    /**
     * Get the value of capacityAdults
     */ 
    public function getCapacityAdults()
    {
        return $this->capacityAdults;
    }

    /**
     * Set the value of capacityAdults
     *
     * @return  self
     */ 
    public function setCapacityAdults($capacityAdults)
    {
        $this->capacityAdults = $capacityAdults;

        return $this;
    }

    /**
     * Get the value of capacityChildren
     */ 
    public function getCapacityChildren()
    {
        return $this->capacityChildren;
    }

    /**
     * Set the value of capacityChildren
     *
     * @return  self
     */ 
    public function setCapacityChildren($capacityChildren)
    {
        $this->capacityChildren = $capacityChildren;

        return $this;
    }
}
