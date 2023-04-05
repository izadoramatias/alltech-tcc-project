<?php

namespace App\Service;

use App\Entity\Donations;

class DonationDTO
{
    public function createDonationEntity(array $donation): Donations
    {
        $entity = new Donations();
        $entity->setFirstName($donation['first_name']);
        $entity->setLastName($donation['last_name']);
        $entity->setEmail($donation['email']);
        $entity->setDonationDescription($donation['donation_description']);
        $entity->setDonationType($donation['donation_type']);
        $entity->setNeighborhood($donation['neighborhood']);
        $entity->setStreet($donation['street']);
        $entity->setNumber($donation['number']);

        return $entity;
    }
}