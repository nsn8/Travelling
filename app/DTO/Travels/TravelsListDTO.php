<?php

namespace App\DTO\Travels;

use App\Enums\TravelsCollectionTypes;
use Illuminate\Support\Facades\Auth;

/**
 * @method TravelsListDTO setSearch(string $search)
 * @method TravelsListDTO setSortingField(string $sortingField)
 * @method TravelsListDTO setSortingDirection(string $sortingDirection)
 * @method string getSearch()
 * @method TravelsListDTO getSortingField()
 * @method TravelsListDTO getSortingDirection()
 */

class TravelsListDTO extends ListDTO
{
    protected TravelsCollectionTypes $type;

    protected string $search;

    protected string $sortingField;

    protected string $sortingDirection;

    public function __construct(array $data)
    {
        $this->parentId = Auth::id();
        $this->type = TravelsCollectionTypes::from($data['filter']);
        $this->search = $data['search'] ?? '';
        $this->sortingField = $data['sorting_field'];
        $this->sortingDirection = $data['sorting_direction'];
    }

    public function setType(string $type): TravelsListDTO
    {
        $this->type = TravelsCollectionTypes::from($type);

        return $this;
    }

    public function getType(): string
    {
        return $this->type->value;
    }
}
