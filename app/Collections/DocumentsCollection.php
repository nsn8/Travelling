<?php

namespace App\Collections;

use App\Collections\Collection;
use App\DTO\Documents\DocumentsListDTO;
use App\DTO\DTO;
use Illuminate\Support\Facades\DB;

class DocumentsCollection extends Collection
{
    private AccommodationsCollection $accommodationsCollection;

    public function __construct(DocumentsListDTO $dto)
    {
        $this->data = $dto;

        $this->init();
    }

    public function init(): void
    {
        $this->accommodationsCollection = new AccommodationsCollection($this->data);

        $this->items = $this->accommodationsCollection->getAll();
    }
}
