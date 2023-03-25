<?php

namespace App\Model;

class Address
{
    public function __construct(
        private string $neighborhood,
        private string $street,
        private string $number
    ){}
}