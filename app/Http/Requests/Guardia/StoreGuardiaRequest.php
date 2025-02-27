<?php

namespace App\Http\Requests\Guardia;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuardiaRequest extends FormRequest
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
            'fecha_hora' => 'required|date',
            'grupo' => 'required|string',
            'servicio_id' => 'required|integer|exists:servicios,id_servicio',
            'movil_id' => 'required|integer|exists:moviles,id_movil',
            'acargo_id' => 'required|integer|exists:voluntarios,id_voluntario',
            'vol_rea_rev_id' => 'required|integer|exists:voluntarios,id_voluntario',
            'km_inicial' => 'required|integer',
            'km_final' => 'required|integer|gt:km_inicial',
            'carga_combustible' => 'nullable|numeric|boolean',
            'monto' => 'nullable|numeric',
            'observaciones' => 'nullable|string',
            'items' => 'required|array',
            'items.*' => 'in:Si,No,Bajo,Normal,Falta,Dañado,En Llanta'
        ];
    }
}
