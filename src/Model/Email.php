<?php

namespace App\Model;

use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class Email
{
    public function validateEmail(string $email): string
    {
        $emailPattern = '/^[^@\s]+@[^@\s]+\.[^@\s]+$/';
        if (preg_match($emailPattern, $email)) {
            return $email;
        }
        throw new BadRequestException('O email informado é inválido.', 400);
    }
}