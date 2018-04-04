<?php

namespace App\Cadastro;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model {

    protected $fillable = ['id', 'pessoa_id', 'descricao'];

    public function pessoa() {
        return $this->hasOne('App\Cadastro\Pessoa');
    }

}
