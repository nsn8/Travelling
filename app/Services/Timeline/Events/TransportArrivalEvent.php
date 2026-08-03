<?php

namespace App\Services\Timeline\Events;

use Carbon\Carbon;

class TransportArrivalEvent extends TimelineEvent
{
    protected string $arrivalCity;
    protected string $arrivalCountry;

    protected function init(array $data): void
    {
        $this->rawDate = Carbon::parse($data['arrival_date']);

        $this->arrivalCity = $data['arrival_city'];
        $this->arrivalCountry = $data['arrival_country'];
    }
}
