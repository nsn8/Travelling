<?php

namespace App\Http\Requests;

use App\Enums\TravelsCollectionTypes;
use Illuminate\Foundation\Http\FormRequest;

class TravelListRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'filter' => 'string|in:' . implode(',', TravelsCollectionTypes::values()),
            'search' => 'string|nullable',
            'sorting_field' => 'string|in:start_date,end_date',
            'sorting_direction' => 'string|in:asc,desc',
        ];
    }
}
