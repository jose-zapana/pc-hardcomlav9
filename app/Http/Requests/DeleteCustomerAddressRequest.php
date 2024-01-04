<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteCustomerAddressRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'address_id' => 'required|exists:customer_addresses,id',
        ];
    }

    public function messages()
    {
        return [
            'address_id.required' => 'La :attribute es obligatoria.',
            'address_id.exists' => 'La :attribute no existe en la base de datos.',
        ];
    }

    public function attributes()
    {
        return [
            'address_id' => 'Dirección',
        ];
    }
}
