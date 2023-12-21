<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
         'order_number'=>'required|string|unique:orders,order_number',
         'status'=>'required|in:pending,delivered',
         'delivery_address'=>'required|string',
         'delivery_date'=>'required|date',
         'package_id'=>'required|exists:packages,id',
         'driver_id'=>'required|exists:drivers,id',
        ];
    }
}
