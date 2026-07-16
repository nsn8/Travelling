<?php

namespace App\DTO\Documents;

use App\DTO\Documents\DocumentDTO;
use App\Enums\DocumentTypes;

/**
 * @method AccommodationDTO setAccommodationName(string $name)
 * @method AccommodationDTO setAccommodationCountry(string $country)
 * @method AccommodationDTO setAccommodationCity(string $city)
 * @method AccommodationDTO setAccommodationAddress(string $address)
 * @method AccommodationDTO setCheckInDate(string $checkInDate)
 * @method AccommodationDTO setCheckOutDate(string $checkOutDate)
 * @method string getAccommodationName()
 * @method string getAccommodationCountry()
 * @method string getAccommodationCity()
 * @method string getAccommodationAddress()
 * @method string getCheckInDate()
 * @method string getCheckOutDate()
 */

class AccommodationDTO extends DocumentDTO
{
    protected ?string $accommodationName;
    protected ?string $accommodationCountry;
    protected ?string $accommodationCity;
    protected ?string $accommodationAddress;
    protected ?string $checkInDate;
    protected ?string $checkOutDate;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->accommodationName = $data['accommodation_name'] ?? null;
        $this->accommodationCountry = $data['accommodation_country'] ?? null;
        $this->accommodationCity = $data['accommodation_city'] ?? null;
        $this->accommodationAddress = $data['accommodation_address'] ?? null;
        $this->checkInDate = $data['check_in_date'] ?? null;
        $this->checkOutDate = $data['check_out_date'] ?? null;

        $this->setType(DocumentTypes::ACCOMMODATION->value);
    }
}
