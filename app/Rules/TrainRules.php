<?php

namespace App\Rules;

use App\Rules\DocumentRulesInterface;

class TrainRules implements DocumentRulesInterface
{

    public static function get(): array
    {
        return [
            'departure_railway_station' => 'required|string',
            'arrival_railway_station'   => 'required|string',
            'cart_number'               => 'required|string',
            'place_number'              => 'required|string',
        ];
    }
}
