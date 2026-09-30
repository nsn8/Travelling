<?php

namespace App\DTO\Data;

use App\DTO\DTO;

/**
 * @method string|null getSearch()
 * @method void setSearch(?string $search)
 */

class SearchAirportDTO extends DTO
{
    protected ?string $search;

    public function __construct(array $data)
    {
        $this->search = $data['search'] ?? null;
    }
}
