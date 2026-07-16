<?php

namespace App\DTO\Documents;

use App\DTO\DTO;
use App\DTO\Travels\ListDTO;

class DocumentsListDTO extends ListDTO
{
    public function __construct(array $data)
    {
        $this->parentId = $data['travel_id'];
    }
}
