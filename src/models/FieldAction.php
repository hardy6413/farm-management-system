<?php

class FieldAction extends BaseClass{
    private $person;
    private $createdAt;
    private $isCompleted;
    private $description;
    private $actionName;
    private $actionParams = [];
    //todo zrobic parsa na created at


    public function __construct($person, $createdAt, $description, $actionName,  $actionParams,  $isCompleted = false)
    {
        $this->person = $person;
        $this->createdAt = $createdAt;
        $this->isCompleted = $isCompleted;
        $this->description = $description;
        $this->actionName = $actionName;
        $this->actionParams = $actionParams;
    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id): void
    {
        $this->id = $id;
    }


    public function getPerson()
    {
        return $this->person;
    }


    public function setPerson($person): void
    {
        $this->person = $person;
    }


    public function getCreatedAt()
    {
        return $this->createdAt;
    }


    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }


    public function getIsCompleted()
    {
        return $this->isCompleted;
    }


    public function setIsCompleted($isCompleted): void
    {
        $this->isCompleted = $isCompleted;
    }


    public function getDescription()
    {
        return $this->description;
    }


    public function setDescription($description): void
    {
        $this->description = $description;
    }


    public function getActionName()
    {
        return $this->actionName;
    }


    public function setActionName($actionName): void
    {
        $this->actionName = $actionName;
    }


    public function getActionParams(): array
    {
        return $this->actionParams;
    }


    public function setActionParams(array $actionParams): void
    {
        $this->actionParams = $actionParams;
    }




}