<?php

namespace App\Rules;

use App\Rules\DocumentRulesInterface;

class TransportRules implements DocumentRulesInterface
{

    public static function get(): array
    {
        return [
            'transport_name'    => 'string',
            'departure_country' => 'required|string',
            'departure_city'    => 'required|string',
            'arrival_country'   => 'required|string',
            'arrival_city'      => 'required|string',
            'departure_date'    => 'required|date',
            'arrival_date'      => 'required|date',
        ];
    }
}
