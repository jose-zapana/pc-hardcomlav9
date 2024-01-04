<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMethodShipRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ship_id' => 'required|exists:method_shippings,id',
            'name' => 'required|string|min:4|max:30',
            'image' => 'image',
            'shop' => 'required|exists:shops,id'
        ];
    }

    public function messages()
    {
        return [
            'ship_id.required' => 'La :attribute es obligatoria.',
            'ship_id.exists' => 'La :attribute no existe en la base de datos.',
            'name.required' => 'El :attribute es obligatorio.',
            'name.string' => 'El :attribute debe contener caracteres válidos.',
            'name.min' => 'La longitud del :attribute es muy corta.',
            'name.max' => 'La longitud del :attribute es muy larga.',
            'image.image' => 'El tipo de archivo de la :attribute es incorrecto.',
            'shop.required' => 'La :attribute es obligatoria.',
            'shop.exists' => 'La :attribute no existe en la base de datos.'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre de envio',
            'image' => 'imagen',
            'shop' => 'tienda',
            'ship_id' => 'envio'
        ];
    }
}
