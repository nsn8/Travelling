<?php

namespace App\Services\Timeline;

use App\Collections\DocumentsCollection;
use App\Factories\TimelineEventsFactory;
use App\Services\Timeline\Events\DateEvent;
use Carbon\Carbon;

class Timeline
{
    private DocumentsCollection $documents;

    private array $events;

    public function __construct(DocumentsCollection $documents)
    {
        $this->documents = $documents;
        $this->events = $this->createEvents();
    }

    public function get(): array
    {
        $result = collect($this->events)->transform(function ($item) {
            return $item->getAsArray();
        });

        return $result->toArray();
    }

    private function createEvents(): array
    {
        $events = [];

        foreach ($this->documents->get() as $document) {
            $events[] = TimelineEventsFactory::create((array) $document, true);
            $events[] = TimelineEventsFactory::create((array) $document, false);
        }

        //return $this->sortEvents($events);
        $dateEvents = $this->createDateEvents($events);

        return $this->sortEvents(array_merge($dateEvents, $events));
    }

    private function createDateEvents(array $events): array
    {
        $dates = collect($events)->transform(function ($item) {
            return $item->getDate();
        });

        $dateEvents = [];

        foreach (array_unique($dates->toArray()) ?? [] as $date) {
            $dateEvents[] = new DateEvent(['date' => $date]);
        }

        return $dateEvents;
    }

    private function sortEvents(array $events): array
    {
        usort($events, function ($event1, $event2) {
            $date1 = Carbon::parse($event1->getRawDate());
            $date2 = Carbon::parse($event2->getRawDate());
            return $date1 <=> $date2;
        });

        return $events;
    }
}
