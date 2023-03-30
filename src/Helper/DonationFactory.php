<?php

namespace App\Helper;

use App\Entity\Donations;
use App\Model\Address;
use App\Model\Donation;
use App\Model\Email;

class DonationFactory
{
    public function createDonation(\stdClass $jsonData): Donation
    {
        $donation = new Donation(
            $jsonData->first_name,
            $jsonData->last_name,
            new Email($jsonData->email),
            $jsonData->donation_description,
            $jsonData->donation_type,
            new Address($jsonData->neighborhood, $jsonData->street, $jsonData->number),
        );

        return $donation;
    }

    public function createDonationEntity(Donation $donation): Donations
    {
        $entity = new Donations();
        $entity->setFirstName($donation->getFirstName());
        $entity->setLastName($donation->getLastName());
        $entity->setEmail($donation->getEmail());
        $entity->setDonationDescription($donation->getDonationDescription());
        $entity->setDonationType($donation->getDonationType());
        $entity->setNeighborhood($donation->getAddress()->getNeighborhood());
        $entity->setStreet($donation->getAddress()->getStreet());
        $entity->setNumber($donation->getAddress()->getNumber());

        return $entity;
    }
}