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
    protected string $accommodationName;
    protected string $accommodationCountry;
    protected string $accommodationCity;
    protected string $accommodationAddress;
    protected string $checkInDate;
    protected string $checkOutDate;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->accommodationName = $data['accommodation_name'];
        $this->accommodationCountry = $data['accommodation_country'];
        $this->accommodationCity = $data['accommodation_city'];
        $this->accommodationAddress = $data['accommodation_address'];
        $this->checkInDate = $data['check_in_date'];
        $this->checkOutDate = $data['check_out_date'];
        $this->type = DocumentTypes::ACCOMMODATION->value;
    }
}
