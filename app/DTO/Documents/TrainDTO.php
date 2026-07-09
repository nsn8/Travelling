<?php

namespace App\DTO\Documents;

use App\Enums\TransportTypes;

/**
 * @method TrainDTO setDepartureRailwayStation(string $station)
 * @method TrainDTO setArrivalRailwayStation(string $station)
 * @method TrainDTO setCartNumber(string $number)
 * @method TrainDTO setPlaceNumber(string $place)
 * @method string getDepartureRailwayStation()
 * @method string getArrivalRailwayStation()
 * @method string getCartNumber()
 * @method string getPlaceNumber()
 */

class TrainDTO extends TransportDTO
{
    protected string $departureRailwayStation;
    protected string $arrivalRailwayStation;
    protected string $cartNumber;
    protected string $placeNumber;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->departureRailwayStation = $data['departure_railway_station'];
        $this->arrivalRailwayStation = $data['arrival_railway_station'];
        $this->cartNumber = $data['cart_number'];
        $this->placeNumber = $data['place_number'];
        $this->type = TransportTypes::TRAIN->value;
    }
}
