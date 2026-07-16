<?php

namespace App\Collections;

use App\DTO\DTO;
use App\DTO\Travels\ListDTO;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Collection as LaravelCollection;

abstract class Collection
{
    protected const string MODEL_CLASS = '';

    protected LaravelCollection $items;

    protected Builder $builder;

    protected DTO $data;

    protected ConnectionInterface $connection;

    public function __construct(ListDTO $data)
    {
        $this->connection = DB::connection('mysql');

        $this->data = $data;

        $this->builder = $this->connection
            ->table(static::MODEL_CLASS::TABLE)
            ->select()
            ->where(static::MODEL_CLASS::PARENT_COLUMN, '=', $data->getParentId());

        $this->init();
    }

    public function getAll(): LaravelCollection
    {
        return $this->builder->get();
    }

    public final function get(): array
    {
        return $this->items->toArray();
    }

    public abstract function init(): void;

    protected function setSearchCondition(string $search): void
    {
        $search = mb_strtolower($search);
        $searchColumn = static::MODEL_CLASS::SEARCH_COLUMN;

        $this->builder->whereRaw("LOWER({$searchColumn}) LIKE '%{$search}%'");
    }

    protected function setSorting(string $sortingField, string $sortingDirection): void
    {
        $this->builder->orderBy($sortingField, $sortingDirection);
    }
}
