<?php

namespace App\Factories;

use App\DTO\Documents\AccommodationDTO;
use App\DTO\Documents\BusDTO;
use App\DTO\Documents\DocumentDTO;
use App\DTO\Documents\FlightDTO;
use App\DTO\Documents\TrainDTO;
use App\Enums\DocumentTypes;
use App\Enums\TransportTypes;

class DocumentDTOFactory
{
    public static function create(array $data): DocumentDTO
    {
        return match ($data['document_type']) {
            DocumentTypes::ACCOMMODATION->value => new AccommodationDTO($data),
            TransportTypes::FLIGHT->value       => new FlightDTO($data),
            TransportTypes::TRAIN->value        => new TrainDTO($data),
            TransportTypes::BUS->value          => new BusDTO($data),
        };
    }
}
