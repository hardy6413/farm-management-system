<?php
require_once 'Address.php';
require_once 'UserAccount.php';

class Farm extends BaseClass{
    private string $name;

    private UserAccount $Owner;

    private Address  $farmAddres;

    private int $token;

    private string $image;


    public function __construct(string $name, UserAccount $Owner, Address $farmAddres, int $token, string $image)
    {
        $this->name = $name;
        $this->Owner = $Owner;
        $this->farmAddres = $farmAddres;
        $this->token = $token;
        $this->image = $image;
    }


    public function getId(): int
    {
        return $this->id;
    }


    public function setId(int $id): void
    {
        $this->id = $id;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getOwner(): UserAccount
    {
        return $this->Owner;
    }


    public function setOwner(UserAccount $Owner): void
    {
        $this->Owner = $Owner;
    }


    public function getFarmAddres(): Address
    {
        return $this->farmAddres;
    }


    public function setFarmAddres(Address $farmAddres): void
    {
        $this->farmAddres = $farmAddres;
    }


    public function getToken(): int
    {
        return $this->token;
    }


    public function setToken(int $token): void
    {
        $this->token = $token;
    }


    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }




}