<?php

namespace App\Collections;

use App\DTO\Documents\DocumentsListDTO;
use App\Enums\DocumentTypes;
use App\Enums\TransportTypes;
use \Illuminate\Support\Collection as LaravelCollection;

class DocumentsCollection extends Collection
{
    public function __construct(DocumentsListDTO $dto)
    {
        $this->data = $dto;

        $this->init();
    }

    public function init(): void
    {
        $result = collect();

        $result = $result->merge($this->initAccommodations());
        $result = $result->merge($this->initBusses());
        $result = $result->merge($this->initTrains());
        $result = $result->merge($this->initFlights());
        $result = $result->merge($this->initShips());

        $this->items = $result;
    }

    private function initAccommodations(): LaravelCollection
    {
        $collection = new AccommodationsCollection($this->data)->getAll();

        $collection->map(function ($item) {
            $item->type = DocumentTypes::ACCOMMODATION->value;
        });

        return $collection;
    }

    private function initBusses(): LaravelCollection
    {
        $collection = new BusesCollection($this->data)->getAll();

        $collection->map(function ($item) {
            $item->type = TransportTypes::BUS->value;
        });

        return $collection;
    }

    private function initTrains(): LaravelCollection
    {
        $collection = new TrainsCollection($this->data)->getAll();

        $collection->map(function ($item) {
            $item->type = TransportTypes::TRAIN->value;
        });

        return $collection;
    }

    private function initFlights(): LaravelCollection {
        $collection = new FlightsCollection($this->data)->getAll();

        $collection->map(function ($item) {
            $item->type = TransportTypes::FLIGHT->value;
        });

        return $collection;
    }

    private function initShips(): LaravelCollection
    {
        $collection = new ShipsCollection($this->data)->getAll();

        $collection->map(function ($item) {
            $item->type = TransportTypes::SHIP->value;
        });

        return $collection;
    }
}
