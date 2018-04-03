<?php

namespace App\Cadastro;

use Illuminate\Database\Eloquent\Model;

class PessoaContato extends Model
{
    protected $fillable = ['pessoa_id','descricao','email','telefone'];


    public function pessoa()
    {
        return $this->belongsToMany('App\Cadastro\Pessoa');
    }
}
