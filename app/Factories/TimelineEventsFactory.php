<?php

namespace App\Factories;

use App\Enums\DocumentTypes;
use App\Enums\TransportTypes;
use App\Services\Timeline\Events\AccommodationCheckInEvent;
use App\Services\Timeline\Events\AccommodationCheckOutEvent;
use App\Services\Timeline\Events\BusDepartureEvent;
use App\Services\Timeline\Events\BusArrivalEvent;
use App\Services\Timeline\Events\FlightArrivalEvent;
use App\Services\Timeline\Events\FlightDepartureEvent;
use App\Services\Timeline\Events\ShipArrivalEvent;
use App\Services\Timeline\Events\ShipDepartureEvent;
use App\Services\Timeline\Events\TimelineEvent;
use App\Services\Timeline\Events\TrainArrivalEvent;
use App\Services\Timeline\Events\TrainDepartureEvent;

class TimelineEventsFactory
{
    public static function create(array $document, bool $start = true): TimelineEvent
    {
        $event = null;

        switch ($document['type']) {
            case DocumentTypes::ACCOMMODATION->value:
                $event = $start
                    ? new AccommodationCheckInEvent($document)
                    : new AccommodationCheckOutEvent($document);
                break;
            case TransportTypes::BUS->value:
                $event = $start
                    ? new BusDepartureEvent($document)
                    : new BusArrivalEvent($document);
                break;
            case TransportTypes::TRAIN->value:
                $event = $start
                    ? new TrainDepartureEvent($document)
                    : new TrainArrivalEvent($document);
                break;
            case TransportTypes::FLIGHT->value:
                $event = $start
                    ? new FlightDepartureEvent($document)
                    : new FlightArrivalEvent($document);
                break;
            case TransportTypes::SHIP->value:
                $event = $start
                    ? new ShipDepartureEvent($document)
                    : new ShipArrivalEvent($document);
                break;
        }

        return $event;
    }
}
