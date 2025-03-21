<?php

namespace App\Http\Requests\Movimiento;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovimientoRequest extends FormRequest
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
            'conductor_id' => 'required|integer|exists:conductores,id_conductor',
            'movil_id' => 'required|integer|exists:moviles,id_movil',
            'ciudad_id' => 'required|integer|exists:py_ciudades,id_ciudad',
            'servicio_id' => 'required|integer|exists:servicios,id_servicio',
            'destino' => 'required|string|max:255',
            'fecha_hora_salida' => 'required|date',
            'km_inicial' => 'required|numeric',
            'a_cargo' => 'required|integer|exists:voluntarios,id_voluntario',
            'fecha_hora_llegada' => 'required',
            'km_final' => 'required|numeric|gt:km_inicial',
            //'km_recorridos' => 'required|numeric',
            'can_tripulantes' => 'required|integer',
            'observaciones' => 'nullable|string|max:255',
        ];
    }
}
