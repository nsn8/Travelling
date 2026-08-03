<?php

namespace App\Collections;

use App\Models\Documents\Ship;

class ShipsCollection extends Collection
{
    protected const string MODEL_CLASS = Ship::class;

    public function init(): void
    {
        $this->items = $this->getAll();
    }
}
