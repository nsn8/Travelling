<?php

namespace App\Services\Timeline\Events;

use App\Traits\GetAsArrayTrait;
use App\Traits\GetSetTrait;
use Carbon\Carbon;

/**
 * @method string getDate()
 * @method TimelineEvent setDate(string $date)
 */

abstract class TimelineEvent
{
    use GetSetTrait;
    use GetAsArrayTrait;

    protected string $rawDate;
    protected string $date;
    protected string $time;
    protected string $name;
    protected string $type;
    protected string $document;

    public function __construct(array $data)
    {
        $this->name = $data['name'];

        $this->init($data);
        $this->resolveDateTime();
        $this->resolveClass($data['type'], $data['id']);
    }

    protected abstract function init(array $data): void;

    private function resolveDateTime(): void
    {
        $eventDate = Carbon::parse($this->rawDate);

        $this->date = $eventDate->format('d.m.Y');
        $this->time = $eventDate->format('H:i');
    }

    private function resolveClass(string $documentType, int $documentId): void
    {
        $this->document = "{$documentType}-{$documentId}";
    }
}
