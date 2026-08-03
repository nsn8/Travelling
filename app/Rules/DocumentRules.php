<?php

namespace App\Rules;

use App\Enums\DocumentTypes;

class DocumentRules implements DocumentRulesInterface
{
    public static function get(): array
    {
        return [
            'id'   => 'integer|nullable',
            'document_name' => 'string|nullable',
            'document_type' => 'string|in:' . implode(',', DocumentTypes::values()),
        ];
    }
}
