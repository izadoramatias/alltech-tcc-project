<?php

namespace App\Model;

class Donation
{
    private ?string $first_name = null;
    private ?string $last_name = null;
    private ?Email $email = null;
    private ?string $donation_description = null;
    private ?string $donation_type = null;
    private Address $address;

    public function __construct(
        string $first_name,
        string $last_name,
        Email $email,
        string $donation_description,
        string $donation_type,
        Address $address
    ) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->donation_description = $donation_description;
        $this->donation_type = $donation_type;
        $this->address = $address;
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

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setFirstName(?string $first_name): void
    {
        $this->first_name = $first_name;
    }

    public function setLastName(?string $last_name): void
    {
        $this->last_name = $last_name;
    }

    public function setEmail(?Email $email): void
    {
        $this->email = $email;
    }

    public function setDonationDescription(?string $donation_description): void
    {
        $this->donation_description = $donation_description;
    }

    public function setDonationType(?string $donation_type): void
    {
        $this->donation_type = $donation_type;
    }
}