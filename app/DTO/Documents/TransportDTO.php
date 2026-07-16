<?php

namespace App\DTO\Documents;

use App\DTO\Documents\DocumentDTO;

/**
 * @method TransportDTO setTransportName(string $name)
 * @method TransportDTO setDepartureCountry(string $country)
 * @method TransportDTO setDepartureCity(string $city)
 * @method TransportDTO setDepartureDate(string $date)
 * @method TransportDTO setArrivalCountry(string $country)
 * @method TransportDTO setArrivalCity(string $city)
 * @method TransportDTO setArrivalDate(string $date)
 * @method string getTransportName()
 * @method string getDepartureCountry()
 * @method string getDepartureCity()
 * @method string getDepartureDate()
 * @method string getArrivalCountry()
 * @method string getArrivalCity()
 * @method string getArrivalDate()
 */

abstract class TransportDTO extends DocumentDTO
{
    protected ?string $transportName;
    protected ?string $departureCountry;
    protected ?string $arrivalCountry;
    protected ?string $departureCity;
    protected ?string $arrivalCity;
    protected ?string $departureDate;
    protected ?string $arrivalDate;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->transportName = $data['transport_name'] ?? null;
        $this->departureCountry = $data['departure_country'] ?? null;
        $this->arrivalCountry = $data['arrival_country'] ?? null;
        $this->departureCity = $data['departure_city'] ?? null;
        $this->arrivalCity = $data['arrival_city'] ?? null;
        $this->departureDate = $data['departure_date'] ?? null;
        $this->arrivalDate = $data['arrival_date'] ?? null;
    }
}
