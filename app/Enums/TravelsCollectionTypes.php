<?php

namespace App\Enums;

enum TravelsCollectionTypes: string
{
    case ALL = 'all';
    case FUTURE = 'future';
    case CURRENT = 'current';
    case PAST = 'past';

    case DELETED = 'deleted';

    public static function values(): array
    {
        return array_map(fn(self $case) => $case->value, self::cases());
    }
}
