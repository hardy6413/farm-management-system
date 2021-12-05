<?php

class Address extends BaseClass {
    private string $street;

    private string $city;

    private string $postalCode;

    private string $buildingNumber;


    public function __construct(string $street, string $city, string $postalCode, string $buildingNumber)
    {
        $this->street = $street;
        $this->city = $city;
        $this->postalCode = $postalCode;
        $this->buildingNumber = $buildingNumber;
    }

    public function __toString()
    {
        return "Street: ".$this->getStreet()."<br>City: ".$this->getCity();
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
