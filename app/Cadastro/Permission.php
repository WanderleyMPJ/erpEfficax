<?php

namespace App\Cadastro;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {

    public function perfils() {
        return $this->belongsToMany(\App\Cadastro\Perfil::class);
    }

}
