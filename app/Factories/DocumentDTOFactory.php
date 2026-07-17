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
        if ($data['document_type'] == DocumentTypes::ACCOMMODATION->value) {
            $dto = new AccommodationDTO($data);
        }

        if ($data['document_type'] == DocumentTypes::TRANSPORT->value) {
            $dto = match ($data['transport_type']) {
                TransportTypes::FLIGHT->value => new FlightDTO($data),
                TransportTypes::TRAIN->value => new TrainDTO($data),
                TransportTypes::BUS->value => new BusDTO($data),
            };
        }

        return $dto;
    }
}
