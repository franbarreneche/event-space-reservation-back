<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class SpaceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min: 5', 'max:50'],
            'description' => ['required', 'string', 'min: 5', 'max:255'],
            'type' => ['required', 'string', 'min: 3', 'max:50'],
            'address' => ['required', 'string', 'min: 5', 'max:50'],
            'latitude' => ['required', 'numeric', 'min: -90', 'max:90'],
            'longitude' => ['required', 'numeric', 'min: -180', 'max:180'],
            'capacity' => ['required', 'numeric', 'min:1', 'max:1000'],
            'images' => ['required', 'array', 'min:1', 'max:5'],
            'images.*' => ['required', File::image()->max('10mb')],
        ];
    }
}
