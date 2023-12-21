<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     *    
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'tracking_number' => 'required|max:15|string|unique:packages,tracking_number',
            'weight' => 'required|numeric|string',
            'status' => 'required|string|in:shipped,delivered',
            'sender_name' => 'required|string',
            'sender_address' => 'required|string',
            'receiver_name' => 'required|string',
            'receiver_address' => 'required|string',
            'driver_id' => 'required|exists:drivers,id'

        ];
    }
}
