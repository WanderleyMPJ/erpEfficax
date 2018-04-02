<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoaRequest extends FormRequest
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
    public function messages()
    {
        return [
            'nome.required'=>'Preencha um nome',
            'nome.max'=>'Nome deve ter até 255 caracteres',
            'nome.min'=>'Nome deve ter no mínimo 2 caracteres',
            'rq_inscest.required'=>'Preencha um RG ou Inscrição Estadual',
            'rg_inscest.max'=>'RG ou incrição estadual deve ter até 20 caracteres',
            'rg_inscest.min'=>'RG ou incrição estadual deve ter no mínimo 5 caracteres',
            'cnpj_cpf.required'>'Preencha o CPF ou CNPJ',
            'cnpj_cpf.max'>'CPF ou CNPJ deve ter até 30 caracteres',
            'cnpj_cpf.min'>'CPF ou CNPJ deve ter no mínimo 5 caracteres',
            'tipo_pessoa.required'=>'Escolha o Tipo de Pessoa',
            'fantasia.required'=>'Preencha o Nome Fantasia',
            'c_descricao.required'=>'Preencha um Título',
            'c_descricao.max'=>'Título deve ter até 255 caracteres',
            'c_telefone.required'=>'Preencha um Número de Telefone'

        ];
    }
    public function rules()
    {
        return [
            'nome'=>'required|min:2|max:255',
            'rg_inscest'=>'required|min:5|max:20',
            'cnpj_cpf'=>'required|min:5|max:30',
            'tipo_pessoa'=>'required',
            'fantasia'=>'required',
            'ativo',
            'grupo[]',
            'c_descricao'=>'required|max:255',
            'c_telefone'=>'required',
            'c_email',
            'e_desc',
            'e_cep',
            'e_estado',
            'e_cidade',
            'e_bairro',
            'e_rua',
            'e_num',

        ];

    }
}
