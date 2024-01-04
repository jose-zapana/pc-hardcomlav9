<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMethodsPaymentsRequest extends FormRequest
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
            'payment_id' => 'required|exists:method_payments,id',
            'name' => 'required|string|min:4|max:30',
            'image' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'payment_id.required' => 'El :attribute es obligatoria.',
            'payment_id.exists' => 'El :attribute no existe en la base de datos.',
            'name.required' => 'El :attribute es obligatorio.',
            'name.string' => 'El :attribute debe contener caracteres válidos.',
            'name.min' => 'La longitud del :attribute es muy corta.',
            'name.max' => 'La longitud del :attribute es muy larga.',
            'image.image' => 'El tipo de archivo de la :attribute es incorrecto.'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre de categoría',
            'image' => 'imagen',
            'payment_id' => 'metodo'
        ];
    }
}
