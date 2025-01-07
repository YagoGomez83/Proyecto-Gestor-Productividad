<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegionalUnitRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'center_id' => 'required|integer|exists:centers,id',

            //
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es requerido.',
            'name.string' => 'El formato no coincide.',
            'name.max' => 'El campo no debe superar los 255 caracteres.',
            'center_id.required' => 'Debe elegir el centro.',
            'center_id.integer' => 'El formato del centro no coincide.',
            'center_id.exists' => 'El centro seleccionado no existe.',
            //
        ];
    }
}
