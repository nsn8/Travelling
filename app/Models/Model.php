<?php

namespace App\Models;

use App\DTO\DTO;
use App\Helpers\DateHelper;
use App\Helpers\StringHelper;
use App\Traits\GetAsArrayTrait;
use App\Traits\GetSetTrait;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

abstract class Model
{
    use GetSetTrait;
    use GetAsArrayTrait;

    public const string TABLE = '';

    public const string PARENT_COLUMN = '';

    public const string SEARCH_COLUMN = '';

    private ConnectionInterface $connection;

    protected ?int $id;

    public function __construct(?int $id, bool $init = false)
    {
        $this->id = $id;

        $this->connection = DB::connection('mysql');

        if ($init) {
            $this->init();
        }
    }

    public function getConnection(): ConnectionInterface
    {
        return $this->connection;
    }

    public function getId(): int
    {
        return $this->id ?? 0;
    }

    protected function setId(?int $id): Model
    {
        $this->id = $id;
        return $this;
    }

    public function save(): int
    {
        $result = $this->connection
            ->table(static::TABLE)
            ->updateOrInsert(
                [
                    'id' => $this->getId()
                ],
                $this->getForInsertOrUpdate()
            );

        if (empty($this->getId()) && $result) {
            $this->setId(DB::getPdo()->lastInsertId());
        }

        return $this->getId();
    }

    public function delete(): int
    {
        $this->connection
            ->table(static::TABLE)
            ->delete($this->getId());

        return $this->getId();
    }

    private function getForInsertOrUpdate(): array
    {
        $data = $this->getAsArray();

        $now = DateHelper::getNowDate();

        $additionalData = [
            'created_at' => $now,
            'updated_at' => $now,
        ];

        if (!is_null($this->id)) {
            unset($additionalData['created_at']);
        }

        $result = array_merge($data, $additionalData);

        if (in_array(static::PARENT_COLUMN, array_keys($result))) {
            return $result;
        }

        $result[static::PARENT_COLUMN] = $this->getParentId();

        return $result;
    }

    public function setData(DTO $data): void
    {
        $data = $data->getAsArray();

        $methods = array_map(function ($property) {
            return 'set' . StringHelper::snakeCaseToCamelCase($property);
        }, array_keys($data));

        $values = array_values($data);

        foreach ($methods as $key => $method) {
            $this->$method($values[$key]);
        }
    }

    protected abstract function init(): void;

    protected abstract function getParentId(): int;
}
