<?php

class Field extends BaseClass{
    private string $name;
    private string $description;
    private float $area;
    private float $extraPayment;
    private string $blockNumber;
    private bool $isProperty;

    /**
     * @param string $name
     * @param string $description
     * @param float $area
     * @param float $extraPayment
     * @param string $blockNumber
     * @param bool $isProperty
     */
    public function __construct(string $name, string $description, float $area, float $extraPayment, string $blockNumber, bool $isProperty)
    {
        $this->name = $name;
        $this->description = $description;
        $this->area = $area;
        $this->extraPayment = $extraPayment;
        $this->blockNumber = $blockNumber;
        $this->isProperty = $isProperty;
    }


}