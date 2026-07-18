<?php

namespace App\Models\Documents;

/**
 * @method Ship setDeparturePort(string $port)
 * @method Ship setArrivalPort(string $port)
 * @method Ship setDeckNumber(string $number)
 * @method Ship setCabinNumber(string $number)
 * @method Ship setPlaceNumber(string $number)
 * @method string getDeparturePort()
 * @method string getArrivalPort()
 * @method string|null getDeckNumber()
 * @method string|null getCabinNumber()
 * @method string|null getPlaceNumber()
 */

class Ship extends Transport
{
    public const string TABLE = 'ships';

    protected string $departurePort;
    protected string $arrivalPort;
    protected ?string $deckNumber;
    protected ?string $cabinNumber;
    protected ?string $placeNumber;

    protected function init(): void
    {
        // TODO: Implement init() method.
    }
}
