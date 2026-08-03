<?php

namespace App\Models\Documents;

/**
 * @method Transport setTransportName(string $name)
 * @method Transport setDepartureCountry(string $country)
 * @method Transport setDepartureCity(string $city)
 * @method Transport setDepartureDate(string $date)
 * @method Transport setArrivalCountry(string $country)
 * @method Transport setArrivalCity(string $city)
 * @method Transport setArrivalDate(string $date)
 * @method string getTransportName()
 * @method string getDepartureCountry()
 * @method string getDepartureCity()
 * @method string getDepartureDate()
 * @method string getArrivalCountry()
 * @method string getArrivalCity()
 * @method string getArrivalDate()
 */

abstract class Transport extends Document
{
    protected string $transportName;
    protected string $departureCountry;
    protected string $arrivalCountry;
    protected string $departureCity;
    protected string $arrivalCity;
    protected string $departureDate;
    protected string $arrivalDate;
}
