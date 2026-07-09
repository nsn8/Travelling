<?php

namespace App\Collections;

use App\DTO\DTO;
use App\DTO\Travels\TravelsListDTO;
use App\Enums\TravelsCollectionTypes;
use App\Helpers\DateHelper;
use App\Models\Travel;
use \Illuminate\Support\Collection as LaravelCollection;

class TravelsCollection extends Collection
{
    protected const string MODEL_CLASS = Travel::class;

    /** @var TravelsListDTO */
    protected DTO $data;

    private function getFutureTravels(): LaravelCollection
    {
        return $this->builder
            ->where('start_date', '>', DateHelper::getNowDate(DateHelper::DATE_FORMAT))
            ->where('is_deleted', 0)
            ->get();
    }

    private function getCurrentTravels(): LaravelCollection
    {
        return $this->builder
            ->where('start_date', '<=', DateHelper::getNowDate(DateHelper::DATE_FORMAT))
            ->where('end_date', '>=', DateHelper::getNowDate(DateHelper::DATE_FORMAT))
            ->where('is_deleted', 0)
            ->get();
    }

    private function getPastTravels(): LaravelCollection
    {
        return $this->builder
            ->where('end_date', '<', DateHelper::getNowDate(DateHelper::DATE_FORMAT))
            ->where('is_deleted', 0)
            ->get();
    }

    private function getDeletedTravels(): LaravelCollection
    {
        return $this->builder
            ->where('is_deleted', 1)
            ->get();
    }

    #[\Override]
    public function init(): void
    {
        if (!empty($this->data->getSearch())) {
            $this->setSearchCondition($this->data->getSearch());
        }

        $this->setSorting($this->data->getSortingField(), $this->data->getSortingDirection());

        $this->items = match ($this->data->getType()) {
            TravelsCollectionTypes::FUTURE->value  => $this->getFutureTravels(),
            TravelsCollectionTypes::CURRENT->value => $this->getCurrentTravels(),
            TravelsCollectionTypes::PAST->value    => $this->getPastTravels(),
            TravelsCollectionTypes::DELETED->value => $this->getDeletedTravels(),
            default => $this->getAll(),
        };
    }
}
