<?php

namespace App\Cadastro;

use Illuminate\Database\Eloquent\Model;

class PessoaEndereco extends Model
{
    protected $fillable = ['pessoa_id','descricao','cep','logradouro','bairro','cidade','uf','complemento','referencia'];
    public function pessoa()
    {
        return $this->belongsToMany('App\Cadastro\Pessoa');
    }
}
