<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    public const string DATE_FORMAT = 'Y-m-d';
    public const string DATE_TIME_FORMAT = 'Y-m-d H:i:s';

    public static function getNowDate(string $format = self::DATE_TIME_FORMAT): string
    {
        return Carbon::now()->format($format);
    }
}
