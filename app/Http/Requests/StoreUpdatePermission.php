<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePermission extends FormRequest
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

        return [
            'name' => ['required', 'string', 'min:3', 'max:255', "unique:permissions,name,{$id},id"]
            // 'name' => "required|min:3|max:255|unique:permissions,name,{$id},id"
        ];
    }

    public function messages()
    {
        return [
            'min' => 'Campo :attribute deve ter no mínimo 3 caracteres',
            'max' => 'Campo :attribute deve ter no máximo 255 caracteres',
            'unique' => 'A permissão já está cadastrada',
            'required' => 'O campo :attribute é obrigatorio!'
        ];
    }

}
