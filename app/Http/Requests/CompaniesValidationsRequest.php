<?php
// En este archivo se definen las reglas de validación para el formulario de creación de empresas.
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CompaniesValidationsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:companies,name|string',
        ];
    }
}
