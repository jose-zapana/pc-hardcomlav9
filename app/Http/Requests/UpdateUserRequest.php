<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'dni' => 'required|string|size:8',
            'email' => 'required|string|email|max:255',
            'image' => 'image'
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'El :attribute es obligatorio.',
            'user_id.exists' => 'El :attribute no existe en la base de datos.',
            'name.required' => 'El :attribute es obligatorio.',
            'name.string' => 'El :attribute debe contener caracteres válidos',
            'name.max' => 'El :attribute es demasiado largo.',
            'dni.required' => 'El :attribute es obligatorio.',
            'dni.string' => 'El :attribute debe contener caracteres válidos.',
            'dni.size' => 'El :attribute debe contener 8 dígitos.',
            'email.required' => 'El :attribute es obligatorio.',
            'email.string' => 'El :attribute debe contener caracteres válidos.',
            'email.email' => 'El :attribute no tiene formato de email adecuado.',
            'email.max' => 'El :attribute es demasiado largo.',
            'image.image' => 'El :attribute debe ser un formato de imagen correcto'
        ];
    }

    public function attributes()
    {
        return [
            'user_id' => 'identificador del usuario',
            'name' => 'nombre del usuario',
            'dni' => 'DNI',
            'email' => 'correo electrónico'
        ];
    }
}
