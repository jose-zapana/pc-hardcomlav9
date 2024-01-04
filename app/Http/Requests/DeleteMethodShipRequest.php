<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteMethodShipRequest extends FormRequest
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
        ];
    }

    public function messages()
    {
        return [
            'ship_id.required' => 'La :attribute es obligatoria.',
            'ship_id.exists' => 'La :attribute no existe en la base de datos.',
        ];
    }

    public function attributes()
    {
        return [
            'ship_id' => 'categoría',
        ];
    }
}
