<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:4|max:30',
            'description' => 'nullable|string|min:5|max:50',
            //'image' => 'mimetypes:application/pdf',
            'image' => 'image',
            'shop' => 'required|exists:shops,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El :attribute es obligatorio.',
            'name.string' => 'El :attribute debe contener caracteres válidos.',
            'name.min' => 'La longitud del :attribute es muy corta.',
            'name.max' => 'La longitud del :attribute es muy larga.',
            'description.string' => 'La :attribute debe contener caracteres válidos.',
            'description.min' => 'La longitud de la :attribute es muy corta.',
            'description.max' => 'La longitud de la :attribute es muy larga.',
            'image.image' => 'El tipo de archivo de la :attribute es incorrecto.',
            'shop.required' => 'La :attribute es obligatoria.',
            'shop.exists' => 'La :attribute no existe en la base de datos.'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre de categoría',
            'description' => 'descripción',
            'image' => 'imagen',
            'shop' => 'tienda'
        ];
    }

}
