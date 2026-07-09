<?php

namespace App\Http\Requests;

use App\Enums\TransportTypes;
use App\Rules\AccommodationRules;
use App\Rules\BusRules;
use App\Rules\DocumentRules;
use App\Rules\FlightRules;
use App\Rules\TrainRules;
use App\Rules\TransportRules;
use Illuminate\Foundation\Http\FormRequest;
use App\Enums\DocumentTypes;

class DocumentSaveRequest extends FormRequest
{
    public function rules(): array
    {
        $initialRules = DocumentRules::get();

        $specificRules = [];

        if ($this->input('document_type') === DocumentTypes::ACCOMMODATION->value) {
            $specificRules = AccommodationRules::get();
        }

        if ($this->input('document_type') === DocumentTypes::TRANSPORT->value) {
            $transportRules = TransportRules::get();

            $specificRules = match ($this->input('transport_type')) {
                TransportTypes::FLIGHT->value => FlightRules::get(),
                TransportTypes::TRAIN->value => TrainRules::get(),
                TransportTypes::BUS->value => BusRules::get()
            };

            $specificRules = array_merge($specificRules, $transportRules);
        }

        return array_merge($initialRules, $specificRules);
    }

    public function messages(): array
    {
        ///TODO
        return [];
    }
}
