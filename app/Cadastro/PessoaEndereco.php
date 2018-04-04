<?php

namespace App\Cadastro;

use Illuminate\Database\Eloquent\Model;

class PessoaEndereco extends Model
{
    protected $fillable = ['id','pessoa_id','descricao','cep','logradouro','bairro','cidade','uf','complemento','referencia'];

    public function pessoa()
    {
        return $this->belongsTo('App\Cadastro\Pessoa');
    }
}
