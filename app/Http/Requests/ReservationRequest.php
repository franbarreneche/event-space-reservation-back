<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'event_name' => ['required', 'string', 'min:5', 'max:50'],
            'date_from' => ['required', 'date'],
            'date_to' => ['required', 'date', 'after:date_from'],
            'space_id' => ['required', 'integer', 'exists:spaces,id'],
        ];
    }
}
