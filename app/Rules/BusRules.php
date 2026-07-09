<?php

namespace App\Rules;

use App\Rules\DocumentRulesInterface;

class BusRules implements DocumentRulesInterface
{

    public static function get(): array
    {
        return [
            'departure_station' => 'required|string',
            'arrival_station'   => 'required|string',
            'bus_number'        => 'string',
            'seat_number'       => 'string',
        ];
    }
}
