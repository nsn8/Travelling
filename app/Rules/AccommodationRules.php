<?php

namespace App\Rules;

class AccommodationRules implements DocumentRulesInterface
{
    public static function get(): array
    {
        return [
            'accommodation_name'    => 'required|string',
            'accommodation_country'  => 'required|string',
            'accommodation_city'    => 'required|string',
            'accommodation_address' => 'required|string',
            'check_in_date'         => 'required|date',
            'check_out_date'        => 'required|date',
        ];
    }
}
