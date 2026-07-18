<?php

namespace App\Rules;

use App\Enums\DocumentTypes;

class FlightRules implements DocumentRulesInterface
{
    public static function get(): array
    {
        return [
            'departure_airport'  => 'required|string',
            'arrival_airport'    => 'required|string',
            'luggage_max_weight' => 'integer|nullable',
            'luggage_width'      => 'integer|nullable',
            'luggage_height'     => 'integer|nullable',
            'luggage_length'     => 'integer|nullable',
        ];
    }
}
