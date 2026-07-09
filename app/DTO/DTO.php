<?php

namespace App\DTO;

use App\Traits\GetAsArrayTrait;
use App\Traits\GetSetTrait;

/**
 * @method int getParentId()
 */

class DTO
{
    use GetSetTrait;
    use GetAsArrayTrait;

    protected int $parentId;
}
