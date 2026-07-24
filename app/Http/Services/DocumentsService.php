<?php

namespace App\Http\Services;

use App\Collections\DocumentsCollection;
use App\DTO\Documents\DocumentDTO;
use App\DTO\Documents\DocumentsListDTO;
use App\DTO\Documents\DocumentTimelineDTO;
use App\Factories\DocumentFactory;
use App\Services\Timeline\Timeline;

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

    public function delete(DocumentDTO $documentDTO): bool
    {
        return DocumentFactory::create($documentDTO, true)->delete();
    }

    public function compileTimeline(DocumentTimelineDTO $documentTimelineDTO): array
    {
        return new Timeline(new DocumentsCollection($documentTimelineDTO))->get();
    }
}
