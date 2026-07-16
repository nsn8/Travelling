<?php

namespace App\Http\Services;

use App\Collections\DocumentsCollection;
use App\DTO\Documents\DocumentDTO;
use App\DTO\Documents\DocumentsListDTO;
use App\Factories\DocumentFactory;

class DocumentsService extends Service
{
    public function save(DocumentDTO $documentDTO): void
    {
        DocumentFactory::create($documentDTO)->save();
    }

    public function getList(DocumentsListDTO $documentsListDTO): array
    {
        return new DocumentsCollection($documentsListDTO)->get();
    }
}
