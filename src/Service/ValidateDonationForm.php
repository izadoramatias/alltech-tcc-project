<?php

namespace App\Service;

class ValidateDonationForm
{
    public function validateData($jsonData): string
    {
        $first_name = htmlspecialchars($jsonData->first_name);
        $last_name = htmlspecialchars($jsonData->last_name);
        $email = filter_var($jsonData->email, FILTER_VALIDATE_EMAIL);
        $donation_description = htmlspecialchars($jsonData->donation_description);
        $donation_type = htmlspecialchars($jsonData->donation_type);

        $neighborhood = htmlspecialchars($jsonData->address->neighborhood);
        $street = htmlspecialchars($jsonData->address->street);
        $number = htmlspecialchars($jsonData->address->number);

        return json_encode([
            "first_name" => $first_name,
            "last_name" => $last_name,
            "email" => $email,
            "donation_description" => $donation_description,
            "donation_type" => $donation_type,
            "neighborhood" => $neighborhood,
            "street" => $street,
            "number" => $number
        ]);
    }
}