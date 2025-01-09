<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'regional_unit_id' => 'required|integer|exists:regional_units,id',
            //
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'El nombre de la ciudad es obligatorio',
            'name.string' => 'El formato del nombre no es válido',
            'regional_unit_id.required' => 'La unidad regional es obligatoria',
            'regional_unit_id.integer' => 'El formato de la unidad regional no es válido',
            'regional_unit_id.exists' => 'La unidad regional no existe',
            //
        ];
    }
}
