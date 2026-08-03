<?php

namespace App\Services\Timeline\Events;

use App\Enums\TimelineEventTypes;

class TrainArrivalEvent extends TransportArrivalEvent
{
    protected string $arrivalRailwayStation;

    protected function init(array $data): void
    {
        parent::init($data);
        $this->type = TimelineEventTypes::TRAIN_ARRIVAL->value;

        $this->arrivalRailwayStation = $data['arrival_railway_station'];
    }
}
