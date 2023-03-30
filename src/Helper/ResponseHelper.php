<?php

namespace App\Helper;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ResponseHelper
{
    public static function response($responseContent)
    {
        if (is_null($responseContent)) {
            throw new NotFoundHttpException('Doação com o id informado não existe');
        }

        return $responseContent;
    }
}