<?php

namespace App\Services\Timeline\Events;

use App\Enums\TimelineEventTypes;

class BusDepartureEvent extends TransportDepartureEvent
{
    protected string $departureStation;

    protected function init(array $data): void
    {
        parent::init($data);
        $this->type = TimelineEventTypes::BUS_DEPARTURE->value;

        $this->departureStation = $data['departure_station'];
    }
}
