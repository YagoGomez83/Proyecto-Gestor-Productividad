<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'service_date' => 'required|date',
            'service_time' => 'required|date_format:H:i',
            'user_id' => 'required|exists:users,id',
            'group_id' => 'required|exists:groups,id',
            'city_id' => 'required|exists:cities,id',
            'initial_police_movement_code_id' => 'required|exists:police_movement_code,id',
            'final_police_movement_code_id' => 'required|exists:police_movement_code,id',
            'status' => 'required|in:preventive,reactive',
            'description' => 'required',

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
            'service_date.required' => 'La fecha es requerida',
            'service_date.date' => 'La fecha debe ser una fecha válida',
            'service_time.required' => 'El horario es requerido',
            'service_time.date_format' => 'El horario debe estar en formato HH:mm',
            'user_id.required' => 'El usuario es requerido',
            'user_id.exists' => 'El usuario no existe',
            'group_id.required' => 'El grupo es requerido',
            'group_id.exists' => 'El grupo no existe',
            'city_id.required' => 'La ciudad es requerida',
            'city_id.exists' => 'La ciudad no existe',
            'initial_police_movement_code_id.required' => 'El código de desplazamiento inicial es requerido',
            'initial_police_movement_code_id.exists' => 'El código de desplazamiento inicial no existe',
            'final_police_movement_code_id.required' => 'El código de desplazamiento final es requerido',
            'final_police_movement_code_id.exists' => 'El código de desplazamiento final no existe',
            'status.required' => 'El estado es requerido',
            'status.in' => 'El estado no es válido',
            'description.required' => 'La descripción es requerida',
            //
        ];
    }
}
