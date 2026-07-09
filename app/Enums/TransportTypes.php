<?php

namespace App\Enums;

enum TransportTypes: string
{
    case FLIGHT = 'flight';
    case TRAIN = 'train';
    case BUS = 'bus';

    public static function values(): array
    {
        return array_map(fn(self $case) => $case->value, self::cases());
    }
}
