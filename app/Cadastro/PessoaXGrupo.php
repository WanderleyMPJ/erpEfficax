<?php

namespace App\Cadastro;

use Illuminate\Database\Eloquent\Model;

class PessoaXGrupo extends Model
{
protected $fillable = [
        'pessoa_id', 'grupo_id',
    ];

    public function Pessoas() {
        return $this->belongsToMany(\App\Cadastro\Pessoa::class);

    }
    public function PessoaNome() {
        $pessoa = $this->Pessoas();

        return $pessoa ;
    }

    public function hasGrupo(\App\Cadastro\Grupo $grupo) {

        return $this->hasAnyGrupos($grupo->Pessoas());
    }

    public function hasAnyGrupos($grupo) {
        if (is_array($grupo) || is_object($grupo)) {
            return !!$grupo->intersect($this->Pessoas)->count();
        }
        return $this->Pessoas->contains('nome', $grupos);
    }
}
