<?php

namespace App\Services\Timeline\Events;

class AccommodationEvent extends TimelineEvent
{
    protected string $accommodationCountry;
    protected string $accommodationCity;
    protected string $accommodationName;

    protected function init(array $data): void
    {
        $this->accommodationCountry = $data['accommodation_country'];
        $this->accommodationCity = $data['accommodation_city'];
        $this->accommodationName = $data['accommodation_name'];
    }
}
