<?php

namespace App\Cadastro\Financeiro;

use Illuminate\Database\Eloquent\Model;

class PlanoConta extends Model
{
    public $fillable = ['codconta', 'descricao','parent_id'];

    public function childs() {
        return $this->hasMany('App\Cadastro\Financeiro\PlanoConta','parent_id','id') ;
    }
}
