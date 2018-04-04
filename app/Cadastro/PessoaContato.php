<?php

namespace App\Cadastro;

use Illuminate\Database\Eloquent\Model;

class PessoaContato extends Model
{
    protected $fillable = ['id','pessoa_id','descricao','email','telefone'];


    public function pessoa()
    {
        return $this->belongsTo('\App\Cadastro\Pessoa');
    }
}
