<?php

namespace App\Model;

class Address
{
    public function __construct(
        private string $neighborhood,
        private string $street,
        private string $number
    ){}

    /**
     * @return string
     */
    public function getNeighborhood(): string
    {
        return $this->neighborhood;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }
}