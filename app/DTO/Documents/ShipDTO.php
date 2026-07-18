<?php

namespace App\DTO\Documents;

use App\Enums\TransportTypes;

/**
 * @method ShipDTO setDeparturePort(string $port)
 * @method ShipDTO setArrivalPort(string $port)
 * @method ShipDTO setDeckNumber(string $number)
 * @method ShipDTO setCabinNumber(string $number)
 * @method ShipDTO setPlaceNumber(string $number)
 * @method string|null getDeparturePort()
 * @method string|null getArrivalPort()
 * @method string|null getDeckNumber()
 * @method string|null getCabinNumber()
 * @method string|null getPlaceNumber()
 */

class ShipDTO extends TransportDTO
{
    protected ?string $departurePort;
    protected ?string $arrivalPort;
    protected ?string $deckNumber;
    protected ?string $cabinNumber;
    protected ?string $placeNumber;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->departurePort = $data['departure_port'] ?? null;
        $this->arrivalPort = $data['arrival_port'] ?? null;
        $this->deckNumber = $data['deck_number'] ?? null;
        $this->cabinNumber = $data['cabin_number'] ?? null;
        $this->placeNumber = $data['place_number'] ?? null;

        $this->setType(TransportTypes::SHIP->value);
    }
}
