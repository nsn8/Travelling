<?php

namespace App\Services\Timeline\Events;

use Carbon\Carbon;

abstract class TransportDepartureEvent extends TimelineEvent
{
    protected string $departureCity;
    protected string $departureCountry;

    protected function init(array $data): void
    {
        $this->rawDate = Carbon::parse($data['departure_date']);

        $this->departureCity = $data['departure_city'];
        $this->departureCountry = $data['departure_country'];
    }
}
