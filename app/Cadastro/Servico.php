<?php

namespace App\Cadastro;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $fillable = ['id', 'descricao', 'servicogrupo_id'];
    
    public function Grupos() {
        return $this->hasMany('App\Cadastro\ServicoGrupo');
    }
}
