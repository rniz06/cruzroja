<?php

namespace App\Http\Requests\Movil;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovilRequest extends FormRequest
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
            'combustible_id' => 'required|exists:moviles_combustibles,id_movil_combustible',
            'tipo_id' => 'required|exists:moviles_tipos,id_movil_tipo',
            'estado_id' => 'required|exists:moviles_estados,id_movil_estado',
            'km_actual' => 'required|numeric',
            'nro_chapa' => 'required|string|min:3|max:7',
            'nro_chasis' => 'required|string|min:5|max:30',
        ];
    }
}
