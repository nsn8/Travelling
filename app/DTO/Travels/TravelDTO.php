<?php

namespace App\DTO\Travels;

use App\DTO\DTO;

/**
 * @method TravelDTO setId (?int $id)
 * @method TravelDTO setName(string $name)
 * @method TravelDTO setStartDate(?string $startDate)
 * @method TravelDTO setEndDate(?string $endDate)
 * @method TravelDTO setIsDeleted(bool $isDeleted)
 * @method int|null getId()
 * @method string getName()
 * @method string|null getStartDate()
 * @method string|null getEndDate()
 * @method bool getIsDeleted()
 */

class TravelDTO extends DTO
{
    protected ?int $id;
    protected string $name;
    protected ?string $startDate;
    protected ?string $endDate;
    protected bool $isDeleted;

    public function __construct(array $data)
    {
        $this->id = $data['travel_id'] ?? null;
        $this->name = $data['travel_name'];
        $this->startDate = $data['start_date'] ?? null;
        $this->endDate = $data['end_date'] ?? null;
        $this->isDeleted = (bool) $data['is_deleted'] ?? false;
    }
}
