<?php

namespace App\Atendimento;

use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model {

    protected $fillable = ['id', 'pessoa_id', 'data_inicio', 'data_fim', 'atendimentoorigem_di', 'atendimentostatus_id'];

    public function pessoa() {
        return $this->belongsTo('App\Cadastro\Pessoa');
    }

    public function nomepessoa() {
        $atendimento = $this;
        $nome = $atendimento->pessoa();
        return $nome;
    }

    public function atendimentostatus() {

        return $this->belongsTo('App\Atendimento\AtendimentoStatus');
    }

    public function nomeatendimentostatus() {
        $atendimento = $this;
        $nome = $atendimento->status();
        return $nome;
    }
    
}
