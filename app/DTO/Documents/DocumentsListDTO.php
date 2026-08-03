<?php

namespace App\DTO\Documents;

use App\DTO\Travels\ListDTO;

/**
 * @method array getActiveFilters()
 * @method string getSearch()
 * @method DocumentsListDTO setActiveFilters(array $activeFilters)
 * @method DocumentsListDTO setSearch(string $search)
 */

class DocumentsListDTO extends ListDTO
{
    protected array $activeFilters;
    protected string $search;

    public function __construct(array $data)
    {
        $this->parentId = $data['travel_id'];
        $this->activeFilters = $data['active_filters'];
        $this->search = $data['search'] ?? '';
    }
}
