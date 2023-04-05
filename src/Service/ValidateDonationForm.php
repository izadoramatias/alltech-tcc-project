<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class ValidateDonationForm
{
    public function validateData($jsonData): string
    {
        $this->checkIfHasEmptyField($jsonData);

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

    private function checkIfHasEmptyField($jsonData): void
    {
        foreach ($jsonData as $key => $value) {
            if ($key === 'address') {
                foreach ($value as $subValue) {
                    if (empty($subValue)) {
                        throw new BadRequestException('Todos os campos devem ser preenchidos.');
                    }
                }
            } else {
                if (empty($value)) {
                    throw new BadRequestException('Todos os campos devem ser preenchidos.');
                }
            }
        }
    }
}