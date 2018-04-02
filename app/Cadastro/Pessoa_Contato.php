<?php

namespace App\Cadastro;

use Illuminate\Database\Eloquent\Model;

class Pessoa_Contato extends Model
{
    protected $fillable = ['pessoa_id','descricao','email','telefone'];
    public function pessoa()
    {
        return $this->belongsTo('App\Cadastro\Pessoa');
    }
}
