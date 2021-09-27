<?php

namespace App;

use League\Csv\Writer;
use League\Csv\Reader;

class PersonRegister
{
    private array $persons;
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
        $personsFromFile = iterator_to_array(Reader::createFromPath($this->filePath, 'r')
            ->getRecords());

        foreach ($personsFromFile as $persons) {
            $this->persons[] = new Person(
                $persons[0],
                $persons[1],
                $persons[2],
                $persons[3]
            );
        }

    }

    public function add(Person $person): void
    {
        $writer = Writer::createFromPath($this->filePath, 'a+');
        $writer->insertOne([
            $person->getName(),
            $person->getSurname(),
            $person->getPersonalNumber(),
            $person->getExtraInfo()
        ]);
    }

    public function persons(): ?array
    {
        if (!empty($this->persons)) {
            return $this->persons;
        }
        return null;
    }

    public function search(string $personalId): ?Person
    {
        if ($this->persons() != NULL) {
            foreach ($this->persons() as $person) {
                if ($person->getPersonalNumber() === $personalId) {
                    return $person;
                }
            }
        }
        return null;
    }

    public function delete(Person $personToDelete): void
    {
        foreach ($this->persons() as $person) {
            if ($person->getPersonalNumber() === $personToDelete->getPersonalNumber()) {
                array_splice($this->persons, array_search($personToDelete, $this->persons), 1);
            }
        }

        $writer = Writer::createFromPath($this->filePath, 'w+');
        $writer->insertAll($this->persons);
    }
}