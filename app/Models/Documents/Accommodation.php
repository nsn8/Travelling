<?php

namespace App\Models\Documents;

/**
 * @method Accommodation setAccommodationName(string $name)
 * @method Accommodation setAccommodationCountry(string $country)
 * @method Accommodation setAccommodationCity(string $city)
 * @method Accommodation setAccommodationAddress(string $address)
 * @method Accommodation setCheckInDate(string $checkInDate)
 * @method Accommodation setCheckOutDate(string $checkOutDate)
 * @method string getAccommodationName()
 * @method string getAccommodationCountry()
 * @method string getAccommodationCity()
 * @method string getAccommodationAddress()
 * @method string getCheckInDate()
 * @method string getCheckOutDate()
 */

class Accommodation extends Document
{
    public const string TABLE = 'accommodations';

    protected string $accommodationName;
    protected string $accommodationCountry;
    protected string $accommodationCity;
    protected string $accommodationAddress;
    protected string $checkInDate;
    protected string $checkOutDate;

    protected function init(): void
    {
        // TODO: Implement init() method.
    }
}
