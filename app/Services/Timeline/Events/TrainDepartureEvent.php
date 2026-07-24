<?php

namespace App\Services\Timeline\Events;

use App\Enums\TimelineEventTypes;

class TrainDepartureEvent extends TransportDepartureEvent
{
    protected string $departureRailwayStation;

    protected function init(array $data): void
    {
        parent::init($data);
        $this->type = TimelineEventTypes::TRAIN_DEPARTURE->value;

        $this->departureRailwayStation = $data['departure_railway_station'];
    }
}
