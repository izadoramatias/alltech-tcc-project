<?php

namespace App\Entity;

use App\Repository\DonationsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DonationsRepository::class)]
class Donations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

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

    #[ORM\ManyToOne(inversedBy: 'donations')]
    private ?Addresses $address_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdDonation(): ?int
    {
        return $this->id_donation;
    }

    public function setIdDonation(int $id_donation): self
    {
        $this->id_donation = $id_donation;

        return $this;
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

    public function getAddressId(): ?Addresses
    {
        return $this->address_id;
    }

    public function setAddressId(?Addresses $address_id): self
    {
        $this->address_id = $address_id;

        return $this;
    }
}
