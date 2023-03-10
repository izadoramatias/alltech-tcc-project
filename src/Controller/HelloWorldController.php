<?php

namespace App\Controller;


use App\Model\Address;
use App\Model\Donation;
use App\Model\Email;
use Symfony\Component\HttpFoundation\Response;

class HelloWorldController
{
//    public function helloWorld(): Response
//    {
//        return new Response(
//            'hello world', 200
//        );
//    }

    public function helloWorld()
    {
        echo '<pre>';
        var_dump(new Donation(
            'izadora',
            'matias',
            new Email('teste@teste.com'),
            'notebook lenovo i5 9° geração',
            'doador',
            new Address(
                'Jardim dos Eucaliptos',
                'Peroba',
                '570'
            )
        ));
        echo '</pre>';

    }
}