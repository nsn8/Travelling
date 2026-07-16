<?php

namespace App\DTO\Travels;

use App\DTO\DTO;

/**
 * @method int getParentId()
 * @method ListDTO setParentId(int $id)
 */

abstract class ListDTO extends DTO
{
    protected int $parentId;
}
