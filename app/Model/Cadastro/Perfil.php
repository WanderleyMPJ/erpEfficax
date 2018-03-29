<?php

namespace App\Model\Cadastro;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model {

    public function permissions() {
        return $this->belongsToMany(\App\Model\Cadastro\Permission::class);
    }

}
