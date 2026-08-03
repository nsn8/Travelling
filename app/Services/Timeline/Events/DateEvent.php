<?php

namespace App\Services\Timeline\Events;

use App\Enums\TimelineEventTypes;
use App\Helpers\DateHelper;
use Carbon\Carbon;

class DateEvent extends TimelineEvent
{
    public function __construct(array $data)
    {
        $this->type = TimelineEventTypes::DATE_SEPARATOR->value;

        $this->rawDate = Carbon::createFromFormat('d.m.Y', $data['date'])->startOfDay();
        $this->name = DateHelper::dateToReadableDate($this->rawDate);
        $this->resolveDateTime();
        $this->document = 'date_separator';
    }

    protected function init(array $data): void
    {

    }
}
