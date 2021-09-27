<?php

namespace App;

class Person
{
    private string $name;
    private string $surname;
    private string $personalNumber;
    private string $extraInfo;

    public function __construct(string $name, string $surname, string $personalNumber, string $extraInfo)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->personalNumber = $personalNumber;
        $this->extraInfo = $extraInfo;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getPersonalNumber(): string
    {
        return $this->personalNumber;
    }

    public function getExtraInfo(): string
    {
        return $this->extraInfo;
    }
}