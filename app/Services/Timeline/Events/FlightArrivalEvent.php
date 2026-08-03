<?php

namespace App\Services\Timeline\Events;

use App\Enums\TimelineEventTypes;

class FlightArrivalEvent extends TransportArrivalEvent
{
    protected string $arrivalAirport;
    protected string $arrivalCountry;
    protected string $arrivalCity;

    protected function init(array $data): void
    {
        parent::init($data);
        $this->type = TimelineEventTypes::FLIGHT_ARRIVAL->value;

        $this->arrivalAirport = $data['arrival_airport'];
    }
}
