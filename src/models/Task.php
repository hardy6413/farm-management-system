<?php

require_once 'PersonalData.php';

class Task extends BaseClass
{
    private string $description;
    private bool $isCompleted;
    private PersonalData $personalData;
    private DateTime $created_at;


    public function getId(): int
    {
        return $this->id;
    }


    public function setId(int $id): void
    {
        $this->id = $id;
    }


    public function getDescription(): string
    {
        return $this->description;
    }


    public function setDescription(string $description): void
    {
        $this->description = $description;
    }


    public function isCompleted(): bool
    {
        return $this->isCompleted;
    }


    public function setIsCompleted(bool $isCompleted): void
    {
        $this->isCompleted = $isCompleted;
    }


    public function getPersonalData(): PersonalData
    {
        return $this->personalData;
    }


    public function setPersonalData(PersonalData $personalData): void
    {
        $this->personalData = $personalData;
    }


    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }


    public function setCreatedAt(DateTime $created_at): void
    {
        $this->created_at = $created_at;
    }



}