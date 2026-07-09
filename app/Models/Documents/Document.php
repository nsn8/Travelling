<?php

namespace App\Models\Documents;

use App\Models\Model;

/**
 * @method Document setName(string $name)
 * @method string getName()
 */

class Document extends Model
{
    public const string PARENT_COLUMN = 'travel_id';
    public const string SEARCH_COLUMN = 'name';

    protected string $name;
    protected ?int $travelId;

    protected function init(): void
    {
        // TODO: Implement init() method.
    }

    protected function getParentId(): int
    {
        return $this->travelId;
    }
}
