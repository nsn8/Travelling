<?php

namespace App\DTO\Documents;

use App\DTO\DTO;

/**
 * @method DocumentDTO setId (?int $id)
 * @method DocumentDTO setName(string $name)
 * @method int|null getId()
 * @method string|null getName()
 */

abstract class DocumentDTO extends DTO
{
    protected ?int $id;
    protected ?string $name;
    private ?string $type;
    protected ?int $travelId;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->travelId = $data['travel_id'] ?? null;
    }

    public function setType(string $type): DocumentDTO
    {
        $this->type = $type;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
