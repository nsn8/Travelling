<?php

namespace App\Services\Timeline\Events;

use App\Enums\TimelineEventTypes;

class BusArrivalEvent extends TransportArrivalEvent
{
    protected string $arrivalCountry;
    protected string $arrivalCity;
    protected string $arrivalStation;
    protected function init(array $data): void
    {
        parent::init($data);
        $this->type = TimelineEventTypes::BUS_ARRIVAL->value;

        $this->arrivalStation = $data['arrival_station'];
    }
}
