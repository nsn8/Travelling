<?php

namespace App\Services\Timeline\Events;

use App\Enums\TimelineEventTypes;

class ShipDepartureEvent extends TransportDepartureEvent
{
    protected string $departurePort;

    protected function init(array $data): void
    {
        parent::init($data);
        $this->type = TimelineEventTypes::SHIP_DEPARTURE->value;

        $this->departurePort = $data['departure_port'];
    }
}
