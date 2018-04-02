<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }
    public function messages()
    {
        return [
            'c_descricao.required'=>'Preencha um Título',
            'c_descricao.max'=>'Título deve ter até 255 caracteres',
            'c_telefone.required'=>'Preencha um Número de Telefone'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'c_descricao'=>'required|max:255',
            'c_telefone'=>'required',
            'c_email'=>''
        ];
    }
}
