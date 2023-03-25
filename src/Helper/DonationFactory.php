<?php

namespace App\Helper;

use App\Model\Address;
use App\Model\Donation;
use App\Model\Email;

class DonationFactory
{
    public function createDonation(string $jsonData): Donation
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
}