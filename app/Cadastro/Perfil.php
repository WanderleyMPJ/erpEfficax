<?php

namespace App\Cadastro;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model {

    public function permissions() {
        return $this->belongsToMany(\App\Cadastro\Permission::class);
    }

}
