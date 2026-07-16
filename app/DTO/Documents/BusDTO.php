<?php

namespace App\DTO\Documents;

use App\Enums\TransportTypes;

/**
 * @method BusDTO setDepartureStation(string $station)
 * @method BusDTO setArrivalStation(string $station)
 * @method BusDTO setBusNumber(string $number)
 * @method BusDTO setSeatNumber(string $seat)
 * @method string getDepartureStation()
 * @method string getArrivalStation()
 * @method string getBusNumber()
 * @method string getSeatNumber()
 */

class BusDTO extends TransportDTO
{
    protected ?string $departureStation;
    protected ?string $arrivalStation;
    protected ?string $busNumber;
    protected ?string $seatNumber;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->departureStation = $data['departure_station'] ?? null;
        $this->arrivalStation = $data['arrival_station'] ?? null;
        $this->busNumber = $data['bus_number'] ?? null;
        $this->seatNumber = $data['seat_number'] ?? null;

        $this->setType(TransportTypes::BUS->value);
    }
}
