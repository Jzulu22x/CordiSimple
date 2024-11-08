<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     * Always returns true, allowing any user to proceed with the request.
     */

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * Defines the validation rules for creating or updating an event.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50|unique:events,name,' . $this->events,
            'description' => 'nullable|string|max:500',
            'date_start' => 'required|date|after_or_equal:today',
            'date_end' => 'required|date|after_or_equal:date_start',
            'location' => 'required|string|max:250',
            'max_slots' => 'required|integer|max:500',
            'status' => 'required|boolean',
        ];
    }

    /**
     * Custom error messages for validation failures.
     * Provides specific error messages for each validation rule.
     */

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.unique' => 'El nombre ya está en uso.',
            'name.max' => 'El nombre sobrepasa los caracteres permitidos (50).',
            'description.max' => 'La descripción sobrepasa los caracteres permitidos (500).',
            'date_start.required' => 'La fecha de inicio es obligatoria.',
            'date_start.date' => 'La fecha de inicio debe ser una fecha válida.',
            'date_start.after_or_equal' => 'La fecha de inicio no puede ser una fecha pasada.',
            'date_end.required' => 'La fecha de finalización es obligatoria.',
            'date_end.date' => 'La fecha de finalización debe ser una fecha válida.',
            'date_end.after_or_equal' => 'La fecha de finalización debe ser posterior o igual a la fecha de inicio.',
            'location.required' => 'La ubicación es obligatoria.',
            'max_slots.required' => 'El número máximo de slots es obligatorio.',
            'max_slots.integer' => 'El número máximo de slots debe ser un número entero.',
            'status.required' => 'El estado es obligatorio.',
            'status.boolean' => 'El estado debe ser verdadero o falso.',
        ];
    }
}