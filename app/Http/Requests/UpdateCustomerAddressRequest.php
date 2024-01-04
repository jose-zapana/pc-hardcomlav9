<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerAddressRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'address_id' => 'required|exists:customer_addresses,id',
            'customer_id' => 'required|exists:customers,id',
            'address' => 'required|string|min:4|max:100',
            'country' => 'required|string|min:3|max:30',
            'city' => 'required|string|min:3|max:30',
            'province' => 'nullable|string|min:3|max:50'
        ];
    }

    public function messages()
    {
        return [
            'address_id.required' => 'La :attribute es obligatoria.',
            'address_id.exists' => 'La :attribute no existe en la base de datos.',
            'customer_id.required' => 'El :attribute es obligatoria.',
            'customer_id.exists' => 'El :attribute no existe en la base de datos.',
            'address.required' => 'La :attribute es obligatoria.',
            'address.string' => 'La :attribute debe contener caracteres válidos.',
            'address.min' => 'La longitud de la :attribute es muy corta.',
            'address.max' => 'La longitud de la :attribute es muy larga.',
            'country.required' => 'El :attribute es obligatorio.',
            'country.string' => 'El :attribute debe contener caracteres válidos.',
            'country.min' => 'La longitud del :attribute es muy corta.',
            'country.max' => 'La longitud del :attribute es muy larga.',
            'city.required' => 'La :attribute es obligatoria.',
            'city.string' => 'La :attribute debe contener caracteres válidos.',
            'city.min' => 'La longitud de la :attribute es muy corta.',
            'city.max' => 'La longitud de la :attribute es muy larga.',
            'province.string' => 'La :attribute debe contener caracteres válidos.',
            'province.min' => 'La longitud de la :attribute es muy corta.',
            'province.max' => 'La longitud de la :attribute es muy larga.'
        ];
    }

    public function attributes()
    {
        return [
            "address_id" => 'dirección',
            'customer_id' => 'cliente',
            'address' => 'direccion',
            'country' => 'país',
            'city' => 'ciudad',
            'province' => 'provincia'
        ];
    }
}
