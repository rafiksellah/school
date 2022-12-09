<?php

namespace App\Entity;

use App\Entity\Student;

class SearchData
{
    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }
    
    public function setFirstName (string $firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }
    public function setLastName (string $lastName)
    {
        $this->lastName = $lastName;
    }
}