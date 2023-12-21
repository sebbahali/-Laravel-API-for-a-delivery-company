<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverRequest extends FormRequest
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

           'name'=>'required|string',
           'license_number'=>'required|string|unique:drivers,license_number',
           'phone'=>'required|integer',
           'status'=>'required|in:available,unavailable'
           
        ];
    }
}
