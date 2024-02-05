<?php

class Location {
    private $city;
    private $province;

    public function __construct($city, $province) {
        $this->city = $city;
        $this->province = $province;
    }

    /**
     * Get the value of city
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */ 
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of province
     */ 
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set the value of province
     *
     * @return  self
     */ 
    public function setProvince($province)
    {
        $this->province = $province;

        return $this;
    }
}
