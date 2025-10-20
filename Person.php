<?php

class Person
{

    /**
     * @var string
     */
    private string $firstName;
    /**
     * @var string
     */
    private string $lastName;
    /**
     * @var string
     */
    private string $sex;
    /**
     * @var string
     */
    private string $yearOfBirth;

    public function __construct(string $firstName, string $lastName, string $sex, string $yearOfBirth)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->sex = $sex;
        $this->yearOfBirth = $yearOfBirth;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getSex(): string
    {
        return $this->sex;
    }

    public function getYearOfBirth(): string
    {
        return $this->yearOfBirth;
    }

    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public static function readFromCSV(string $filePath): array
    {
        $people = [];
        if (($handle = fopen($filePath, "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ";")) !== false) {
                if (count($data) === 4) {
                    $people[] = new Person($data[0], $data[1], $data[2], $data[3]);
                }
            }
            fclose($handle);
        }
        return $people;
    }
}