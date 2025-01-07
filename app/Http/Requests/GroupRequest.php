<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
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

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'El nombre del centro es obligatorio',
            'name.string' => 'El formato del nombre no es válido',
            'name.max' => 'El nombre no puede superar los 255 caracteres',
            'center_id.required' => 'El centro es obligatorio',
            'center_id.integer' => 'El formato del centro no es válido',
            'center_id.exists' => 'El centro no existe',
            //
        ];
    }
}
