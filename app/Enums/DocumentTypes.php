<?php

namespace App\Enums;

enum DocumentTypes: string
{
    case ACCOMMODATION = 'accommodation';
    case TRANSPORT = 'transport';

    public static function values(): array
    {
        return array_map(fn(self $case) => $case->value, self::cases());
    }
}
