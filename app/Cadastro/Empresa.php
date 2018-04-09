<?php

namespace App\Cadastro;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model {

    protected $fillable = ['id', 'pessoa_id', 'descricao'];

    public function pessoa()
    {
        return $this->belongsTo('App\Cadastro\Pessoa');
    }
    public function nomepessoa(){
        $empresa = $this;
        $nome = $empresa->pessoa();
    return $nome;
    }
}
