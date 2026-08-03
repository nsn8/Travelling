<?php

namespace App\Collections;

use App\Models\Documents\Bus;

class BusesCollection extends Collection
{
    protected const string MODEL_CLASS = Bus::class;

    public function init(): void
    {
        $this->items = $this->getAll();
    }
}
