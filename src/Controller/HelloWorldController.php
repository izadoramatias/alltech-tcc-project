<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;

class HelloWorldController
{
    public function helloWorld(): Response
    {
        return new Response(
            'hello world', 200
        );
    }
}