<?php

namespace App\DTO\Documents;

use App\Enums\DocumentFilters;

class DocumentTimelineDTO extends DocumentsListDTO
{
    public function __construct(array $data)
    {
        $data['active_filters'] = DocumentFilters::values();

        parent::__construct($data);
    }
}
