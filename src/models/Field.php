<?php

class Field extends BaseClass{
    private  $name;
    private  $description;
    private  $area;
    private  $extraPayment;
    private  $blockNumber;
    private  $isProperty;
    private  $image;
    private  $fieldActions = []; //todo



    public function __construct($name, $description, $area, $extraPayment, $blockNumber, $isProperty, $image, $actions,$id = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->area = $area;
        $this->extraPayment = $extraPayment;
        $this->blockNumber = $blockNumber;
        $this->isProperty = $isProperty;
        $this->image = $image;
        $this->fieldActions = $actions;
        $this->setId($id);
    }

    public function __toString(){
        return "Block number: ".$this->getBlockNumber(). "<br> Name: ".$this->getName().
            "<br> Area: ".$this->getArea();
    }


    public function getFieldActions()
    {
        return $this->fieldActions;
    }


    public function setFieldActions($fieldActions): void
    {
        $this->fieldActions = $fieldActions;
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

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }


    public function getArea()
    {
        return $this->area;
    }


    public function setArea($area): void
    {
        $this->area = $area;
    }


    public function getExtraPayment()
    {
        return $this->extraPayment;
    }


    public function setExtraPayment($extraPayment): void
    {
        $this->extraPayment = $extraPayment;
    }


    public function getBlockNumber()
    {
        return $this->blockNumber;
    }


    public function setBlockNumber($blockNumber): void
    {
        $this->blockNumber = $blockNumber;
    }


    public function getIsProperty()
    {
        return $this->isProperty;
    }


    public function setIsProperty($isProperty): void
    {
        $this->isProperty = $isProperty;
    }


    public function getImage()
    {
        return $this->image;
    }


    public function setImage($image): void
    {
        $this->image = $image;
    }

    }