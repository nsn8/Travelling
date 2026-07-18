<?php

namespace App\Collections;

use App\DTO\Documents\DocumentsListDTO;
use App\Enums\DocumentTypes;
use App\Enums\TransportTypes;
use \Illuminate\Support\Collection as LaravelCollection;

class DocumentsCollection extends Collection
{
    private array $mapFilterToCollection = [
        DocumentTypes::ACCOMMODATION->value => AccommodationsCollection::class,
        TransportTypes::BUS->value          => BusesCollection::class,
        TransportTypes::TRAIN->value        => TrainsCollection::class,
        TransportTypes::FLIGHT->value       => FlightsCollection::class,
        TransportTypes::SHIP->value         => ShipsCollection::class
    ];

    public function __construct(DocumentsListDTO $dto)
    {
        $this->data = $dto;

        $this->init();
    }

    public function init(): void
    {
        $result = collect();

        foreach ($this->data->getActiveFilters() as $filter) {
            $result = $result->merge($this->initCollection($filter));
        }

        $this->items = $result;
    }

    private function initCollection(string $type): LaravelCollection
    {
        /** @var Collection $collection */
        $collection = new $this->mapFilterToCollection[$type]($this->data);

        if (!empty($this->data->getSearch())) {
            $collection->setSearchCondition($this->data->getSearch());
        }

        $items = $collection->getAll();

        $items->map(function ($item) use ($type) {
            $item->type = $type;
        });

        return $items;
    }
}
