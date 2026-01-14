<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropietarioRequest extends FormRequest
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
            "nombre"=>'required|string|max:255',
            "dni"=>'required|string|max:9|regex:^\d{8}[A-Z]{1}^',
            "telefono"=>'required|max:20',
            "direccion"=>'required|string'
        ];
    }

    public function messages()
    {
        return [
            "direccion.required" => "No me has pasado el campo direccion",
            "direccion.string" => "El campo no es una cadena de caracteres",
        ];
    }
}
