<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AtendimentoOrigemRequest extends Request
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
  /*  public function messages()
    {
        return [
            'nome.required'=>'Preencha um nome',
            'nome.max'=>'Nome deve ter até 255 caracteres',
            'nome.min'=>'Nome deve ter no mínimo 2 caracteres',
            'rq_inscest.required'=>'Preencha um RG ou Inscrição Estadual',
            'rg_inscest.max'=>'RG ou incrição estadual deve ter até 20 caracteres',
            'rg_inscest.min'=>'RG ou incrição estadual deve ter no mínimo 5 caracteres',
            'cnpj_cpf.required'=>'Preencha o CPF ou CNPJ',
            'cnpj_cpf.max'=>'CPF ou CNPJ deve ter até 30 caracteres',
            'cnpj_cpf.min'=>'CPF ou CNPJ deve ter no mínimo 5 caracteres',
            'tipo_pessoa.required'=>'Escolha o Tipo de Pessoa',
            'fantasia.required'=>'Preencha o Nome Fantasia',
            'c_descricao.required'=>'Preencha um Título',
            'c_descricao.max'=>'Título deve ter até 255 caracteres',
            'c_telefone.required'=>'Preencha um Número de Telefone',

        ];
    }*/
    public function rules()
    {
        return [
            'descricao',
            
        ];

    }
}
