<?php

class Address extends BaseClass {
    private $street;

    private $city;

    private $postalCode;

    private $buildingNumber;



    public function __construct($street, $city, $postalCode, $buildingNumber)
    {
        $this->street = $street;
        $this->city = $city;
        $this->postalCode = $postalCode;
        $this->buildingNumber = $buildingNumber;
    }

    public function __toString()
    {
        return "City: ".$this->getCity()."<br> Street: ".$this->getStreet()
            ."<br>Postal code: ".$this->getPostalCode()."<br>Building number: ".$this->getBuildingNumber();
    }


    public function getStreet(): string
    {
        return $this->street;
    }


    public function setStreet(string $street): void
    {
        $this->street = $street;
    }



    public function getCity(): string
    {
        return $this->city;
    }


    public function setCity(string $city): void
    {
        $this->city = $city;
    }


    public function getPostalCode(): string
    {
        return $this->postalCode;
    }


    public function setPostalCode(string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }


    public function getBuildingNumber(): string
    {
        return $this->buildingNumber;
    }


    public function setBuildingNumber(string $buildingNumber): void
    {
        $this->buildingNumber = $buildingNumber;
    }


    public function getId(): int
    {
        return $this->id;
    }


    public function setId(int $id): void
    {
        $this->id = $id;
    }




}
