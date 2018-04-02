<?php

namespace App\Cadastro;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model {

    protected $fillable = ['id', 'pessoa_id', 'nome', 'cnpj_cpf', 'rg_inscest', 'fantasia', 'ativo', 
        'tipopessoa'];

    public function Contatos() {
        return $this->hasMany('App\Cadastro\PessoaContato');
    }

    public function enderecos() {
        return $this->hasMany('App\Cadastro\PessoaEndereco');
    }

}
