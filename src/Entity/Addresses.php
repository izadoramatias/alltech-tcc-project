<?php

namespace App\Entity;

use App\Repository\AddressesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AddressesRepository::class)]
class Addresses
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_address = null;

    #[ORM\Column(length: 45)]
    private ?string $street = null;

    #[ORM\Column(length: 45)]
    private ?string $neighborhood = null;

    #[ORM\Column(length: 45)]
    private ?string $number = null;

    #[ORM\OneToMany(mappedBy: 'address_id', targetEntity: Donations::class)]
    private Collection $donations;

    public function __construct()
    {
        $this->donations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAddress(): ?int
    {
        return $this->id_address;
    }

    public function setIdAddress(int $id_address): self
    {
        $this->id_address = $id_address;

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

    /**
     * @return Collection<int, Donations>
     */
    public function getDonations(): Collection
    {
        return $this->donations;
    }

    public function addDonation(Donations $donation): self
    {
        if (!$this->donations->contains($donation)) {
            $this->donations->add($donation);
            $donation->setAddressId($this);
        }

        return $this;
    }

    public function removeDonation(Donations $donation): self
    {
        if ($this->donations->removeElement($donation)) {
            // set the owning side to null (unless already changed)
            if ($donation->getAddressId() === $this) {
                $donation->setAddressId(null);
            }
        }

        return $this;
    }
}
