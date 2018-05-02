<?php

namespace App\Atendimento;

use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model {

    protected $fillable = ['protocolo','solucao','data_inicio','data_termino','pessoa_id','solicitante','atendimentoorigem_id','atendimentostatus_id','solicitacao'];
    protected $dates = ['data_inicio', 'data_fim'];

    public function pessoa() {
        return $this->belongsTo('App\Cadastro\Pessoa');
    }

    public function nomepessoa() {
        $atendimento = $this;
        $nome = $atendimento->pessoa();
        return $nome;
    }

    public function status() {

        return $this->belongsTo('App\Atendimento\AtendimentoStatus');
    }

    public function nomeatendimentostatus() {
        $atendimento = $this;
        $nome = $atendimento->status();
        return $nome;
    }
    public function atendimentodet() {
        return $this->hasMany('App\Atendimento\AtendimentoDet');
    }
    public function addatendimentodet($det){
        return $this->atendimentodet()->save($det);
    }
    
}
