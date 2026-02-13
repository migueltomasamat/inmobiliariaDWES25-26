<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInmuebleRequest extends FormRequest
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
            'num_catastro'=>'required|string|max:20|regex:^\d{7}[A-Z0-9]{7}\d{4}[A-Z]{2}^',
            'direccion'=>'required|string|max:255',
            'numero'=>'required|integer',
            'bloque'=>'alpha_num',
            'piso'=>'integer',
            'puerta'=>'alpha',
            'cod_postal'=>"required|integer|exists:ciudads",
            'propietario_id'=>'required|integer|exists:propietarios,id'
        ];
    }
}
