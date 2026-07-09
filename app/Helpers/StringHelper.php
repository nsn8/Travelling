<?php

namespace App\Helpers;

class StringHelper
{
    public static function snakeCaseToCamelCase(string $string): string
    {
        return str_replace('_', '', ucwords($string, '_'));
    }

    public static function camelCaseToSnakeCase(string $string): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $string));
    }
}
