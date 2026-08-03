<?php

namespace App\Services\Timeline\Events;

use App\Enums\TimelineEventTypes;

class ShipArrivalEvent extends TransportArrivalEvent
{
    protected string $arrivalPort;

    protected function init(array $data): void
    {
        parent::init($data);
        $this->type = TimelineEventTypes::SHIP_ARRIVAL->value;

        $this->arrivalPort = $data['arrival_port'];
    }
}
