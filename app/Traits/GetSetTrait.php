<?php

namespace App\Traits;

trait GetSetTrait
{
    public function __call(string $name, array $arguments)
    {
        if (str_contains($name, 'set')) {
            $property = lcfirst(str_replace('set', '', $name));

            if (property_exists($this, $property)) {
                $this->$property = array_shift($arguments);

                return $this;
            }
        }

        if (str_contains($name, 'get')) {
            $property = lcfirst(str_replace('get', '', $name));

            if (property_exists($this, $property)) {
                return $this->$property;
            }
        }

        throw new \Exception("Method {$name} does not exist.");
    }
}
