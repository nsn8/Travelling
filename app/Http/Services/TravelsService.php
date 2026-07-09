<?php

namespace App\Http\Services;

use App\Collections\TravelsCollection;
use App\DTO\Travels\TravelDTO;
use App\DTO\Travels\TravelsListDTO;
use App\Models\Travel;

class TravelsService extends Service
{
    public function getList(TravelsListDTO $data): array
    {
        return new TravelsCollection($data)->get();
    }

    public function save(TravelDTO $data): int
    {
        return new Travel($data->getId())
            ->setName($data->getName())
            ->setStartDate($data->getStartDate())
            ->setEndDate($data->getEndDate())
            ->save();
    }

    public function delete(TravelDTO $data): bool
    {
        return new Travel($data->getId())->delete();
    }

    public function get(int $id): array
    {
        return new Travel($id, true)->getAsArray();
    }
}
