<?php

namespace App\Models\Documents;

class Bus extends Transport
{
    public const string TABLE = 'buses';

    protected string $departureStation;
    protected string $arrivalStation;
    protected string $busNumber;
    protected string $seatNumber;

    protected function init(): void
    {
        // TODO: Implement init() method.
    }
}
