<?php
require_once 'Address.php';
require_once 'UserAccount.php';

class Farm extends BaseClass{

    private string $name;
    private string $image;
    private int $token;
    private Address  $farmAddress;
    private $fields = [];
    private $workers = [];


    public function __construct(string $name, string $image, int $token, Address $farmAddress, array $fields, array $workers)
    {
        $this->name = $name;
        $this->image = $image;
        $this->token = $token;
        $this->farmAddress = $farmAddress;
        $this->fields = $fields;
        $this->workers = $workers;
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


    public function getImage(): string
    {
        return $this->image;
    }


    public function setImage(string $image): void
    {
        $this->image = $image;
    }


    public function getToken(): int
    {
        return $this->token;
    }


    public function setToken(int $token): void
    {
        $this->token = $token;
    }


    public function getFarmAddress(): Address
    {
        return $this->farmAddress;
    }


    public function setFarmAddress(Address $farmAddress): void
    {
        $this->farmAddress = $farmAddress;
    }

    public function findOwner(){
        foreach ($this->workers as $worker){
            if ($worker instanceof PersonalData){
                if ($worker->isOwner()){
                    return $worker;
                }
            }
        }
    }


}