<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'date_time' => 'required|date|after:now',
            'location' => 'required|string|max:255',
            'people_capacity' => 'required|integer|min:1',
            'status' => 'required|boolean'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre del evento es obligatorio.',
            'date_time.after' => 'La fecha de inicio debe ser futura.',
            'people_capacity.min' => 'El número máximo de lugares debe ser al menos 1.',
            'status.boolean' => 'El estado debe ser verdadero o falso.',
        ];
    }
}