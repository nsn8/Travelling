<?php

namespace App\Factories;

use App\DTO\Documents\DocumentDTO;
use App\Enums\DocumentTypes;
use App\Models\Documents\Accommodation;
use App\Models\Documents\Document;

class DocumentFactory
{
    public static function create(DocumentDTO $dto, bool $forDelete = false): Document
    {
        $document = match ($dto->getType()) {
            DocumentTypes::ACCOMMODATION->value => new Accommodation($dto->getId()),
        };

        if (!$forDelete) {
            $document->setData($dto);
        }

        return $document;
    }
}
