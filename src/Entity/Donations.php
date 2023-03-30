<?php

namespace App\Entity;

use App\Repository\DonationsRepository;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Internal\TentativeType;

#[ORM\Entity(repositoryClass: DonationsRepository::class)]
class Donations implements \JsonSerializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_donation = null;

    #[ORM\Column(length: 45)]
    private ?string $first_name = null;

    #[ORM\Column(length: 45)]
    private ?string $last_name = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $donation_description = null;

    #[ORM\Column(length: 45)]
    private ?string $donation_type = null;

    #[ORM\Column(length: 45)]
    private ?string $street = null;

    #[ORM\Column(length: 45)]
    private ?string $neighborhood = null;

    #[ORM\Column(length: 45)]
    private ?string $number = null;

    public function getIdDonation(): ?int
    {
        return $this->id_donation;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getDonationDescription(): ?string
    {
        return $this->donation_description;
    }

    public function setDonationDescription(string $donation_description): self
    {
        $this->donation_description = $donation_description;

        return $this;
    }

    public function getDonationType(): ?string
    {
        return $this->donation_type;
    }

    public function setDonationType(string $donation_type): self
    {
        $this->donation_type = $donation_type;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getNeighborhood(): ?string
    {
        return $this->neighborhood;
    }

    public function setNeighborhood(string $neighborhood): self
    {
        $this->neighborhood = $neighborhood;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->getIdDonation(),
            'first_name' => $this->getFirstName(),
            'last_name' => $this->getLastName(),
            'email' => $this->getEmail(),
            'donation_description' => $this->getDonationDescription(),
            'donation_type' => $this->getDonationType(),
            'neighborhood' => $this->getNeighborhood(),
            'street' => $this->getStreet(),
            'number' => $this->getNumber(),
        ];
    }
}
