<?php

namespace App\Parsers;

use Transliterator;

class AirportsParser extends CsvParser
{
    protected function setUp(): void
    {
        $this->rows = collect($this->rows)
            ->transform(function ($row) {
                $row['name'] = empty($row['name_rus']) ? $row['name_eng'] : $row['name_rus'];
                $row['city'] = empty($row['city_rus']) ? $row['city_eng'] : $row['city_rus'];
                $row['country'] = empty($row['country_rus']) ? $row['country_eng'] : $row['country_rus'];
                $row['caption'] = "{$row['name']} ({$row['iata_code']})";

                return $row;
            })
            ->toArray();
    }
}
