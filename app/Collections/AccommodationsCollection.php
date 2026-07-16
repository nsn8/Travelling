<?php

namespace App\Collections;

use App\Collections\Collection;
use App\Models\Documents\Accommodation;

class AccommodationsCollection extends Collection
{
    protected const string MODEL_CLASS = Accommodation::class;

    public function init(): void
    {
        $this->items = $this->getAll();
    }
}
