<?php

namespace App\Helper;

class SerializeObjectsList
{
    public function toArray(array $donations): array
    {
        $donationsArray = [];

        foreach ($donations as $donation) {
            $donationsArray[] = $donation->jsonSerialize();
        }

        return $donationsArray;
    }
}