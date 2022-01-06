<?php

require_once 'PersonalData.php';

class Task extends BaseClass
{
    private $description;
    private $isCompleted;
    private $created_at;
    private $personalData;


    public function __construct($description, $isCompleted, $created_at, $personalData)
    {
        $this->description = $description;
        $this->isCompleted = $isCompleted;
        $this->created_at = $created_at;
        $this->personalData = $personalData;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }


    public function getIsCompleted()
    {
        return $this->isCompleted;
    }


    public function setIsCompleted($isCompleted): void
    {
        $this->isCompleted = $isCompleted;
    }


    public function getCreatedAt()
    {
        return $this->created_at;
    }


    public function setCreatedAt($created_at): void
    {
        $this->created_at = $created_at;
    }


    public function getPersonalData()
    {
        return $this->personalData;
    }


    public function setPersonalData($personalData): void
    {
        $this->personalData = $personalData;
    }




}