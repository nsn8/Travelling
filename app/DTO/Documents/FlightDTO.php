<?php

namespace App\DTO\Documents;

use App\DTO\Documents\TransportDTO;
use App\Enums\TransportTypes;

/**
 * @method FlightDTO setDepartureAirport(string $airport)
 * @method FlightDTO setArrivalAirport(string $airport)
 * @method FlightDTO setLuggageIncluded(bool $luggageIncluded)
 * @method FlightDTO setLuggageMaxWeight(int $maxWeight)
 * @method FlightDTO setLuggageWidth(int $width)
 * @method FlightDTO setLuggageHeight(int $height)
 * @method FlightDTO setLuggageLength(int $length)
 * @method string getDepartureAirport()
 * @method string getArrivalAirport()
 * @method bool getLuggageIncluded()
 * @method int|null getLuggageMaxWeight()
 * @method int|null getLuggageWidth()
 * @method int|null getLuggageHeight()
 * @method int|null getLuggageLength()
 */

class FlightDTO extends TransportDTO
{
    protected ?string $departureAirport;
    protected ?string $arrivalAirport;
    protected bool $luggageIncluded;
    protected ?int $luggageMaxWeight;
    protected ?int $luggageWidth;
    protected ?int $luggageHeight;
    protected ?int $luggageLength;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->departureAirport = $data['departure_airport'] ?? null;
        $this->arrivalAirport = $data['arrival_airport'] ?? null;
        $this->luggageIncluded = !empty($data['luggage_included']);
        $this->luggageMaxWeight = $data['luggage_max_weight'] ?? null;
        $this->luggageWidth = $data['luggage_width'] ?? null;
        $this->luggageHeight = $data['luggage_height'] ?? null;
        $this->luggageLength = $data['luggage_length'] ?? null;

        $this->setType(TransportTypes::FLIGHT->value);
    }
}
