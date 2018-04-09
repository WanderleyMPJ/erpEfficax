<?php

namespace App\Cadastro;



use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model {


    protected $fillable = ['id','nome', 'rg_inscest','cnpj_cpf', 'tipo_pessoa', 'fantasia', 'ativo','user_id'];

    public function Contatos() {

        return $this->hasMany('App\Cadastro\PessoaContato');
    }
    public function empresa() {

        return $this->hasMany('App\Cadastro\Empresa');
    }

    public function enderecos() {
        return $this->hasMany('App\Cadastro\PessoaEndereco');
    }

    public function grupos()
    {
        return $this->hasMany('App\Cadastro\PessoaXGrupo');
    }

    public function addContatos(PessoaContato $cont)
    {
        return $this->contatos()->save($cont);
    }

    public function deletarContato()
    {
        foreach ($this->contatos() as $cont) {
            $cont->delete();
        }

        return true;
    }

    public function addEnderecos(PessoaEndereco $end)
    {
        return $this->enderecos()->save($end);
    }

    public function deletarEnderecos() {
        foreach ($this->enderecos() as $end) {
            $end->delete();
        }

        return true;
    }

}
