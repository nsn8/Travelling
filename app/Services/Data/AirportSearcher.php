<?php

namespace App\Services\Data;

use App\DTO\Data\SearchAirportDTO;
use App\Parsers\AirportsParser;
use App\Parsers\CsvParser;

class AirportSearcher
{
    private const string FILE_PATH ='files/csv/apinfo.ru.csv';

    protected ?string $search;

    public function __construct(SearchAirportDTO $data)
    {
        $this->search = $data->getSearch();
    }

    public function get(): array
    {
        return new AirportsParser(resource_path(self::FILE_PATH))
            ->setSeparator('|')
            ->get(
            [
                'filter' => $this->search ?? '',
                'limit' => 10,
                /// Todo: локализация
                'search_keys' => [
                    'iata_code',
                    'name_rus',
                    'city_rus'
                ]
            ]
        );
    }
}
