<?php

namespace App\Model;

class Address
{
    private string $neighbourhood;
    private string $street;
    private string $number;

    public function __construct(
        string $neighbourhood,
        string $street,
        string $number
    ){
        $this->neighbourhood = $neighbourhood;
        $this->street = $street;
        $this->number = $number;
    }
}