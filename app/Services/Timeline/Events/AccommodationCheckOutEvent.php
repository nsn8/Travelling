<?php

namespace App\Services\Timeline\Events;

use App\Enums\TimelineEventTypes;
use Carbon\Carbon;

class AccommodationCheckOutEvent extends AccommodationEvent
{
    protected function init(array $data): void
    {
        parent::init($data);

        $this->rawDate = Carbon::parse($data['check_out_date']);

        $this->type = TimelineEventTypes::ACCOMMODATION_CHECK_OUT->value;
    }
}
