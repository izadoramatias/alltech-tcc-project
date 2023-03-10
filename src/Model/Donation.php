<?php

namespace App\Model;

use App\Entity\Addresses;
use App\Model\Address;

class Donation
{
    private ?string $first_name = null;
    private ?string $last_name = null;
    private ?Email $email = null;
    private ?string $donation_description = null;
    private ?string $donation_type = null;
    private ?Address $address_id = null;

    public function __construct(
        string $first_name,
        string $last_name,
        Email $email,
        string $donation_description,
        string $donation_type,
        Address $address_id
    ) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->donation_description = $donation_description;
        $this->donation_type = $donation_type;
        $this->address_id = $address_id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function getEmail(): ?Email
    {
        return $this->email;
    }

    public function getDonationDescription(): ?string
    {
        return $this->donation_description;
    }

    public function getDonationType(): ?string
    {
        return $this->donation_type;
    }

    public function getAddressId(): ?Address
    {
        return $this->address_id;
    }
}