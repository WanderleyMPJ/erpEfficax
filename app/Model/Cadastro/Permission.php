<?php

namespace App\Model\Cadastro;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {

    public function perfils() {
        return $this->belongsToMany(\App\Model\Cadastro\Perfil::class);
    }

}
