<?php

namespace App\Parsers;
abstract class Parser
{
    protected string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    protected abstract function parse(): void;

    public abstract function get(array $searchParameters): array;
}
