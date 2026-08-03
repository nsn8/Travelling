<?php

namespace App\Collections;

use App\Models\Documents\Train;

class TrainsCollection extends Collection
{
    protected const string MODEL_CLASS = Train::class;

    public function init(): void
    {
        $this->items = $this->getAll();
    }
}
