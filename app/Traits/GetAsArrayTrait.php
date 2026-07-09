<?php

namespace App\Traits;

use App\Helpers\StringHelper;
use ReflectionClass;

trait GetAsArrayTrait
{
    public function getAsArray(): array
    {
        $properties = $this->getOwnProperties();

        $result = [];

        foreach ($properties as $property) {
            $key = StringHelper::camelCaseToSnakeCase($property);

            $result[$key] = $this->$property;
        }

        return $result;
    }

    private function getOwnProperties(): array
    {
        $reflection = new ReflectionClass($this);

        $properties = $reflection->getProperties();

        return array_map(function ($property) {
            return $property->getName();
        }, $properties);
    }
}
