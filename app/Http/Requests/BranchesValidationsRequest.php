<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchesValidationsRequest extends FormRequest
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
            'name' => 'required|string',
            'email'=>'required|unique:branches,email|string',
            'phone_number' => 'required|unique:branches,phone_number|string',
            'address' => 'nullable||string',
            'city_country' => 'required||string',
            'company_id' => 'required||integer'
        ];

    }
}
