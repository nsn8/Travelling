<?php

namespace App\Models\Documents;

/**
 * @method Flight setDepartureAirport(string $airport)
 * @method Flight setArrivalAirport(string $airport)
 * @method Flight setLuggageIncluded(bool $luggageIncluded)
 * @method Flight setLuggageMaxWeight(int $maxWeight)
 * @method Flight setLuggageWidth(int $width)
 * @method Flight setLuggageHeight(int $height)
 * @method Flight setLuggageLength(int $length)
 * @method string getDepartureAirport()
 * @method string getArrivalAirport()
 * @method bool getLuggageIncluded()
 * @method int|null getLuggageMaxWeight()
 * @method int|null getLuggageWidth()
 * @method int|null getLuggageHeight()
 * @method int|null getLuggageLength()
 */

class Flight extends Transport
{
    public const string TABLE = 'flights';

    protected string $departureAirport;
    protected string $arrivalAirport;
    protected bool $luggageIncluded;
    protected ?int $luggageMaxWeight;
    protected ?int $luggageWidth;
    protected ?int $luggageHeight;
    protected ?int $luggageLength;

    protected function init(): void
    {
        // TODO: Implement init() method.
    }
}
