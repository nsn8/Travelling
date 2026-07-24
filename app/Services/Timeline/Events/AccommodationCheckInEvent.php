<?php

namespace App\Services\Timeline\Events;

use App\Enums\TimelineEventTypes;
use Carbon\Carbon;

class AccommodationCheckInEvent extends AccommodationEvent
{
    protected string $accommodationAddress;

    protected function init(array $data): void
    {
        parent::init($data);

        $this->rawDate = Carbon::parse($data['check_in_date']);

        $this->type = TimelineEventTypes::ACCOMMODATION_CHECK_IN->value;

        $this->accommodationAddress = $data['accommodation_address'];
    }
}
