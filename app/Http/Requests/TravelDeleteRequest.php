<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TravelDeleteRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'travel_id' => 'required|exists:travels,id',
            'travel_name' => 'required|string',
            'is_deleted' => 'required|integer|in:1',
        ];
    }
}
