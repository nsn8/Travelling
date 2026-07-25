<?php

namespace App\Enums;

enum TimelineEventTypes: string
{
    case ACCOMMODATION_CHECK_IN = 'accommodation_check_in';
    case ACCOMMODATION_CHECK_OUT = 'accommodation_check_out';
    case BUS_DEPARTURE = 'bus_departure';
    case BUS_ARRIVAL = 'bus_arrival';
    case TRAIN_DEPARTURE = 'train_departure';
    case TRAIN_ARRIVAL = 'train_arrival';
    case FLIGHT_DEPARTURE = 'flight_departure';
    case FLIGHT_ARRIVAL = 'flight_arrival';
    case SHIP_DEPARTURE = 'ship_departure';
    case SHIP_ARRIVAL = 'ship_arrival';
    case DATE_SEPARATOR = 'date_separator';
}
