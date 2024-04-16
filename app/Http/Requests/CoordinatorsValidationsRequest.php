<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CoordinatorsValidationsRequest extends FormRequest
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
            'name' => 'required|string',
            'email'=>'required|unique:coordinators,email|string',
            'phone_number' => 'required|unique:coordinators,phone_number|string',
            'branche_id' => 'required||integer'
        ];
    }
}
