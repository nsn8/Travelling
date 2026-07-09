<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TravelSaveRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'travel_id' => 'integer|nullable',
            'travel_name' => 'required|string',
            'start_date' => 'date|nullable',
            'end_date' => 'date|nullable|after:start_date',
        ];
    }

    public function messages(): array
    {
        return [
            'travel_name.required' => 'Необходимо заполнить название путешествия',
            'start_date.date' => 'Дата начала имеет некорректный формат',
            'end_date.date' => 'Дата окончания имеет некорректный формат',
            'end_date.after' => 'Дата окончания должна быть больше, чем дата начала',
        ];
    }
}
