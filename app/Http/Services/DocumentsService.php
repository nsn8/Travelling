<?php

namespace App\Http\Services;

use App\DTO\Documents\DocumentDTO;
use App\Factories\DocumentFactory;

class DocumentsService extends Service
{
    public function save(DocumentDTO $documentDTO): void
    {
        DocumentFactory::create($documentDTO)->save();
    }
}
