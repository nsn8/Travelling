<?php

namespace App\Collections;

use App\DTO\Documents\DocumentsListDTO;
use App\Enums\DocumentFilters;
use App\Enums\DocumentTypes;
use App\Enums\TransportTypes;
use \Illuminate\Support\Collection as LaravelCollection;

class DocumentsCollection extends Collection
{
    private array $mapFilterToCollection = [
        DocumentFilters::ACCOMMODATION->value => AccommodationsCollection::class,
        DocumentFilters::BUS->value           => BusesCollection::class,
        DocumentFilters::TRAIN->value         => TrainsCollection::class,
        DocumentFilters::FLIGHT->value        => FlightsCollection::class,
        DocumentFilters::SHIP->value          => ShipsCollection::class
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
