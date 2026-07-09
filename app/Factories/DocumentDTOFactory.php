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
            return new AccommodationDTO($data);
        }

        if ($data['document_type'] == DocumentTypes::TRANSPORT->value) {
            switch ($data['transport_type']) {
                case TransportTypes::FLIGHT->value:
                    return new FlightDTO($data);
                case TransportTypes::TRAIN->value:
                    return new TrainDTO($data);
                case TransportTypes::BUS->value:
                    return new BusDTO($data);
            }
        }
    }
}
