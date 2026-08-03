<?php

namespace App\Models\Documents;

/**
 * @method Train setDepartureRailwayStation(string $station)
 * @method Train setArrivalRailwayStation(string $station)
 * @method Train setCartNumber(string $number)
 * @method Train setPlaceNumber(string $place)
 * @method string getDepartureRailwayStation()
 * @method string getArrivalRailwayStation()
 * @method string getCartNumber()
 * @method string getPlaceNumber()
 */

class Train extends Transport
{
    public const string TABLE = 'trains';

    protected string $departureRailwayStation;
    protected string $arrivalRailwayStation;
    protected string $cartNumber;
    protected string $placeNumber;

    protected function init(): void
    {
        // TODO: Implement init() method.
    }
}
