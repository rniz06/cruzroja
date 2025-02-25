<?php

namespace App\Http\Requests\Conductor;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConductorRequest extends FormRequest
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
            'voluntario_id' => 'required|exists:voluntarios,id_voluntario',
            'licencia_id' => 'required|exists:conductores_licencias,id_conductor_licencia',
            'es_tem' => 'required|boolean',
        ];
    }
}
