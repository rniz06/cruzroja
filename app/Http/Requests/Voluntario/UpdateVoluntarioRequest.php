<?php

namespace App\Http\Requests\Voluntario;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVoluntarioRequest extends FormRequest
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
            'nombres' => 'required|string|max:50',
            'apellido_paterno' => 'required|string|max:20',
            'apellido_materno' => 'required|string|max:20',
            // 'cedula' => 'required|string|min:2|max:2',
            'fecha_nacimiento' => 'required|date',
            'edad' => 'required|numeric|min:2',
            'lugar_nacimiento_id' => 'required',
            'nacionalidad_id' => 'required',
            'sexo_id' => 'required',
            'estado_civil_id' => 'required',
            'grupo_sanguineo_id' => 'required',
            'grado_estudio_id' => 'required',
            'profesion_id' => 'required',
            'estado_id' => 'required'
        ];
    }
}
