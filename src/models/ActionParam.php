<?php

class ActionParam extends BaseClass
{
    private $paramName;
    private $value;

    public function __construct($paramName, $value)
    {
        $this->paramName = $paramName;
        $this->value = $value;
    }


    public function getParamName()
    {
        return $this->paramName;
    }

    public function setParamName($paramName): void
    {
        $this->paramName = $paramName;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value): void
    {
        $this->value = $value;
    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id): void
    {
        $this->id = $id;
    }




}