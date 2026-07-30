<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    public const string DATE_FORMAT = 'Y-m-d';
    public const string DATE_TIME_FORMAT = 'Y-m-d H:i:s';

    ///TODO локализация
    private const array MONTHS_MAP = [
        1 => 'января',
        2 => 'февраля',
        3 => 'марта',
        4 => 'апреля',
        5 => 'мая',
        6 => 'июня',
        7 => 'июля',
        8 => 'августа',
        9 => 'сентября',
        10 => 'октября',
        11 => 'ноября',
        12 => 'декабря'
    ];

    ///TODO локализация
    private const array DAYS_OF_WEEK_MAP = [
        0 => 'воскресенье',
        1 => 'понедельник',
        2 => 'вторник',
        3 => 'среда',
        4 => 'четверг',
        5 => 'пятница',
        6 => 'суббота',
    ];

    public static function getNowDate(string $format = self::DATE_TIME_FORMAT): string
    {
        return Carbon::now()->format($format);
    }

    public static function getTodayDate(string $format = self::DATE_FORMAT): string
    {
        return Carbon::now()
            ->startOfDay()
            ->format($format);
    }

    public static function getYesterdayDate(string $format = self::DATE_FORMAT): string
    {
        return Carbon::now()
            ->subDay()
            ->startOfDay()
            ->format($format);
    }

    public static function getTomorrowDate(string $format = self::DATE_FORMAT): string
    {
        return Carbon::now()
            ->addDay()
            ->startOfDay()
            ->format($format);
    }

    public static function dateToReadableDate(string $date): string
    {
        $date = Carbon::parse($date);

        $day = $date->day;
        $month = self::MONTHS_MAP[$date->month];
        $year = $date->year;
        $dayOfWeek = self::DAYS_OF_WEEK_MAP[$date->dayOfWeek];

        return "{$day} {$month} {$year}, {$dayOfWeek}";
    }
}
