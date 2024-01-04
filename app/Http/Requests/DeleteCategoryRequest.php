<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'La :attribute es obligatoria.',
            'category_id.exists' => 'La :attribute no existe en la base de datos.',
        ];
    }

    public function attributes()
    {
        return [
            'category_id' => 'categoría',
        ];
    }
}
