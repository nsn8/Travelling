<?php

namespace App\Services\Timeline\Events;

use App\Enums\TimelineEventTypes;

class FlightDepartureEvent extends TransportDepartureEvent
{
    protected string $departureAirport;

    protected function init(array $data): void
    {
        parent::init($data);
        $this->type = TimelineEventTypes::FLIGHT_DEPARTURE->value;

        $this->departureAirport = $data['departure_airport'];
    }
}
