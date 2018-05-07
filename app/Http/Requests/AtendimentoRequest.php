<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AtendimentoRequest extends Request
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
            'pessoa_id',
            'data_hora_inicio',
            'data_hora_fim',
            'solicitante',
            'solicitacao',
            'solucao',
            'acao',
            'data_acao',
            'atendimentostatus_id',
            'atendimentoorigem_id',
            'atendente_id'
        ];
    }
}
