<?php

namespace App\Cadastro;

use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
class Pessoa extends Model {

    protected $fillable = ['id', 'pessoa_id', 'nome', 'cnpj_cpf', 'rg_inscest', 'fantasia', 'ativo', 
        'tipopessoa'];

    public function Contatos() {
        return $this->hasMany('App\Cadastro\PessoaContato');
    }

    public function enderecos() {
        return $this->hasMany('App\Cadastro\PessoaEndereco');
    }
    
    public function grupos() {
        return $this->hasMany('App\Cadastro\PessoaXGrupo');
=======
class Pessoa extends Model
{
    protected $fillable = ['nome','rg_inscest','cnpj_cpf','tipo_pessoa','fantasia','ativo','user_id'];


    public function contatos()
    {
        return $this->hasMany('App\Cadastro\Pessoa_Contato');
    }
    public function grupos()
    {
        return $this->belongsToMany('App\Cadastro\Grupos');
    }
    public function enderecos()
    {
        return $this->hasMany('App\Cadastro\Pessoa_Endereco');
    }

    public function addContatos(Pessoa_Contato $cont)
    {
        return $this->contatos()->save($cont);
    }

    public function deletarTelefones()
    {
        foreach ($this->contatos() as $cont) {
            $cont->delete();
        }

        return true;
    }
    public function addEnderecos(Pessoa_Endereco $end)
    {
        return $this->enderecos()->save($end);
    }

    public function deletarEnderecos()
    {
        foreach ($this->enderecos() as $end) {
            $end->delete();
        }

        return true;
>>>>>>> Pedro
    }

}
