<?php

class Field extends BaseClass{
    private string $name;
    private string $description;
    private float $area;
    private float $extraPayment;
    private string $blockNumber;
    private bool $isProperty;
    private string $image;


    public function __construct(string $name, string $description, float $area, float $extraPayment, string $blockNumber, bool $isProperty, string $image)
    {
        $this->name = $name;
        $this->description = $description;
        $this->area = $area;
        $this->extraPayment = $extraPayment;
        $this->blockNumber = $blockNumber;
        $this->isProperty = $isProperty;
        $this->image = $image;
    }

    public function __toString(){
        return "Block number: ".$this->getBlockNumber(). "<br> Name: ".$this->getName().
            "<br> Area: ".$this->getArea();
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


    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }


    public function getArea(): float
    {
        return $this->area;
    }


    public function setArea(float $area): void
    {
        $this->area = $area;
    }


    public function getExtraPayment(): float
    {
        return $this->extraPayment;
    }


    public function setExtraPayment(float $extraPayment): void
    {
        $this->extraPayment = $extraPayment;
    }


    public function getBlockNumber(): string
    {
        return $this->blockNumber;
    }


    public function setBlockNumber(string $blockNumber): void
    {
        $this->blockNumber = $blockNumber;
    }


    public function isProperty(): bool
    {
        return $this->isProperty;
    }


    public function setIsProperty(bool $isProperty): void
    {
        $this->isProperty = $isProperty;
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