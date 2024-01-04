<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'name' => 'required|string|min:5',
            'description' => 'required|string|min:5',
            'stock' => 'required|numeric|min:0',
            'unit_price' => 'required|numeric|min:0',
            'shop' => 'required|numeric|exists:shops,id',
            'infos' => 'required|array',
            'specifications' => 'required|array',
            'categories' => 'required|array',
            'images' => 'required|array',
            'alts' => 'required|array',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El :attribute es obligatorio.',
            'name.string' => 'El :attribute debe contener caracteres válidos.',
            'name.min' => 'El :attribute debe contener 5 caracteres mínimo.',
            'description.required' => 'El :attribute es obligatorio.',
            'description.string' => 'El :attribute be contener caracteres válidos.',
            'description.min' => 'El :attribute debe contener 5 caracteres mínimo.',
            'stock.required' => 'El :attribute es obligatorio.',
            'stock.numeric' => 'El :attribute debe contener numeros.',
            'stock.min' => 'El :attribute no puede ser negativo',
            'unit_price.required' => 'El :attribute es obligatorio.',
            'unit_price.numeric' => 'El :attribute debe contener numeros.',
            'unit_price.min' => 'El :attribute no puede ser negativo',
            'shop_id.required' => 'El :attribute es obligatorio.',
            'shop_id.numeric' => 'El :attribute debe contener numeros.',
            'shop_id.exists' => 'El :attribute no existe en la base de datos.',
            'infos.required' => 'Las :attribute es obligatorio.',
            'infos.array' => 'Las :attribute debe ser una lista de valores.',
            'specifications.required' => 'Las :attribute es obligatorio.',
            'specifications.array' => 'Las :attribute debe ser una lista de valores.',
            'categories.required' => 'Las :attribute es obligatorio.',
            'categories.array' => 'Las :attribute debe ser una lista de valores.',
            'images.required' => 'Las :attribute es obligatorio.',
            'images.array' => 'Las :attribute debe ser una lista de valores.',
            'alts.required' => 'Los :attribute es obligatorio.',
            'alts.array' => 'Los :attribute debe ser una lista de valores.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre del producto',
            'description' => 'descripción del producto',
            'stock' => 'stock',
            'unit_price' => 'precio unitario',
            'infos' => 'informaciones',
            'specifications' => 'especificaciones',
            'categories' => 'categorias',
            'images' => 'imagenes',
            'alts' => 'nombres alternos'
        ];
    }
}
