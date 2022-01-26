<?php
require_once 'Address.php';
require_once 'UserAccount.php';

class Farm extends BaseClass{

    private $name;
    private $image;
    private $token;
    private $farmAddress;
    private $fields = [];
    private $workers = [];


    public function __construct($name, $image, $token,  $farmAddress, $fields, $workers,$id = null)
    {
        $this->name = $name;
        $this->image = $image;
        $this->token = $token;
        $this->farmAddress = $farmAddress;
        $this->fields = $fields;
        $this->workers = $workers;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token): void
    {
        $this->token = $token;
    }

    public function getFarmAddress()
    {
        return $this->farmAddress;
    }

    public function setFarmAddress($farmAddress): void
    {
        $this->farmAddress = $farmAddress;
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    public function setFields(array $fields): void
    {
        $this->fields = $fields;
    }

    public function getWorkers(): array
    {
        return $this->workers;
    }

    public function setWorkers(array $workers): void
    {
        $this->workers = $workers;
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