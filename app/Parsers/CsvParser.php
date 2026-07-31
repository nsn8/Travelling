<?php

namespace App\Parsers;

abstract class CsvParser extends Parser
{
    protected array $rows = [];
    private array $headers = [];
    private string $separator;

    protected function parse(): void
    {
        $handle = fopen($this->filePath, 'r');
        $this->headers = fgetcsv($handle, 0, $this->separator);

        while (($row = fgetcsv($handle, 0, '|')) !== false) {
            /// Todo: разобраться с кодировками
            $row = mb_convert_encoding($row, 'UTF-8', 'Windows-1251');

            $this->rows[] = array_combine($this->headers, $row);
        }

        fclose($handle);

        $this->setUp();
    }

    public function setSeparator(string $separator): CsvParser
    {
        $this->separator = $separator;
        return $this;
    }

    public function get(array $searchParameters): array
    {
        $this->parse();

        $items = collect($this->rows)
            ->filter(function ($item) use ($searchParameters) {
                /// Todo: локализация
                return $this->isFit($item, $searchParameters['search_keys'], $searchParameters['filter']);
            });

        if ($items->count() <= $searchParameters['limit']) {
            return $items->toArray();
        }

        return $items
            ->slice(0, $searchParameters['limit'])
            ->toArray();
    }

    protected abstract function setUp(): void;

    private function isFit(array $item, array $searchKeys, string $filter): bool
    {
        $fits = false;

        foreach ($searchKeys as $searchKey) {
            $fits = $fits || str_contains(mb_strtolower($item[$searchKey]), mb_strtolower($filter));
        }

        return $fits;
    }
}
