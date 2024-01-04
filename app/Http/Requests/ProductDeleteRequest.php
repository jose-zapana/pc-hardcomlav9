<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductDeleteRequest extends FormRequest
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
            'product_id' => 'required|exists:products,id',
        ];
    }

    public function messages()
    {
        return [
            'product_id.required' => 'El :attribute es obligatorio.',
            'product_id.exists' => 'El :attribute no existe en la base de datos.'
        ];
    }

    public function attributes()
    {
        return [
            'product_id' => 'id del producto'
        ];
    }
}
