<?php

namespace App\Collections;

use App\Collections\Collection;
use App\Models\Documents\Flight;

class FlightsCollection extends Collection
{
    protected const string MODEL_CLASS = Flight::class;

    public function init(): void
    {
        // TODO: Implement init() method.
    }
}
