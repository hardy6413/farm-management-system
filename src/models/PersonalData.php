<?php

class PersonalData extends BaseClass
{
    private  $firstName;
    private  $lastName;
    private  $address;
    private $isOwner;


    public function __construct($firstName, $lastName, $address, $isOwner)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->isOwner = $isOwner;
    }

    public function __toString()
    {
        return $this->firstName." ".$this->lastName;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }


    public function getAddress()
    {
        return $this->address;
    }


    public function setAddress($address): void
    {
        $this->address = $address;
    }


    public function isOwner(): bool
    {
        return $this->isOwner;
    }


    public function setIsOwner(bool $isOwner): void
    {
        $this->isOwner = $isOwner;
    }







}