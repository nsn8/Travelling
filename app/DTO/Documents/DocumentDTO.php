<?php

namespace App\DTO\Documents;

use App\DTO\DTO;

/**
 * @method DocumentDTO setId (?int $id)
 * @method DocumentDTO setName(string $name)
 * @method DocumentDTO setType(string $type)
 * @method int|null getId()
 * @method string|null getName()
 * @method string getType()
 */

abstract class DocumentDTO extends DTO
{
    protected ?int $id;
    protected ?string $name;
    protected string $type;
    protected int $travelId;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->travelId = $data['travel_id'] ?? null;
    }
}
