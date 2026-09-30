<?php

namespace App\Http\Services;

use App\DTO\Data\SearchAirportDTO;
use App\Services\Data\AirportSearcher;

class DataService
{
    public function searchAirports(SearchAirportDTO $data): array
    {
        return new AirportSearcher($data)->get();
    }
}
