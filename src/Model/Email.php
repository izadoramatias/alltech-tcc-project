<?php

namespace App\Model;

use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class Email
{
    private string $email;
    public function __construct(string $email)
    {
        $this->email = $this->validateEmail($email);
    }

    public function validateEmail(string $email): string
    {
        $emailPattern = '/^[^@\s]+@[^@\s]+\.[^@\s]+$/';
        if (preg_match($emailPattern, $email)) {
            return $email;
        }
        throw new BadRequestException('O email informado é inválido.', 400);
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}