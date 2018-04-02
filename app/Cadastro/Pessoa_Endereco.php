<?php

namespace App\Cadastro;

use Illuminate\Database\Eloquent\Model;

class Pessoa_Endereco extends Model
{
    protected $fillable = ['pessoa_id','descricao','cep','rua','bairro','cidade','estado', 'num'];
    public function pessoa()
    {
        return $this->belongsTo('App\Cadastro\Pessoa');
    }
}
