<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUser extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->segment(3);

        $rules = [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'min:3', 'max:255', "unique:users,email,{$id},id"],
            'password' => ['required', 'string', 'min:6', 'max:16'],
        ];

        if ($this->method() == 'PUT') {
            $rules['password'] = ['nullable', 'string', 'min:6', 'max:16'];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'min' => 'Campo :attribute deve ter no mínimo 3 caracteres',
            'max' => 'Campo :attribute deve ter no máximo 255 caracteres',
            'unique' => 'O E-mail já está cadastrado',
            'required' => 'O campo :attribute é obrigatorio!'
        ];
    }

}
