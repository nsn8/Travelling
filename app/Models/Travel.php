<?php

namespace App\Models;

use App\DTO\DTO;
use Illuminate\Support\Facades\Auth;

/**
 * @method Travel setName(string $name)
 * @method Travel setStartDate(?string $startDate)
 * @method Travel setEndDate(?string $endDate)
 * @method string getName()
 * @method string|null getStartDate()
 * @method string|null getEndDate()
 */

class Travel extends Model
{
    public const string TABLE = 'travels';

    public const string PARENT_COLUMN = 'user_id';

    public const string SEARCH_COLUMN = 'name';

    protected string $name;
    protected string $startDate;
    protected string $endDate;

    protected bool $isDeleted = false;

    protected function init(): void
    {
        $travelData = (array) $this->getConnection()
            ->table(self::TABLE)
            ->select(['id', 'name', 'start_date', 'end_date', 'is_deleted'])
            ->where('id', '=', $this->getId())
            ->first();

        $this->setId($travelData['id'])
            ->setName($travelData['name'])
            ->setStartDate($travelData['start_date'])
            ->setEndDate($travelData['end_date']);
    }

    protected function getParentId(): int
    {
        return Auth::id();
    }

    public function delete(): int
    {
        return $this->getConnection()
            ->table(static::TABLE)
            ->where('id', '=', $this->getId())
            ->update(['is_deleted' => true]);
    }
}
