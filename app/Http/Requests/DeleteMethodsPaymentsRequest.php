<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteMethodsPaymentsRequest extends FormRequest
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

   
    public function rules()
    {
        return [
            'payment_id' => 'required|exists:method_payments,id',
        ];
    }

    public function messages()
    {
        return [
            'payment_id.required' => 'El :attribute es obligatoria.',
            'payment_id.exists' => 'El :attribute no existe en la base de datos.',
        ];
    }

    public function attributes()
    {
        return [
            'category_id' => 'metodo',
        ];
    }
}
