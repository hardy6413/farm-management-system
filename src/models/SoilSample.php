<?php

require_once 'Field.php';

class SoilSample extends BaseClass
{
    private string $sampleDescription;
    private DateTime $created_at;
    private Field $field;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getSampleDescription(): string
    {
        return $this->sampleDescription;
    }

    public function setSampleDescription(string $sampleDescription): void
    {
        $this->sampleDescription = $sampleDescription;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }

    public function setCreatedAt(DateTime $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getField(): Field
    {
        return $this->field;
    }

    public function setField(Field $field): void
    {
        $this->field = $field;
    }



}