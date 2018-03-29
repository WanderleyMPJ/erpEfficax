<?php

namespace App\Cadastro;

use Illuminate\Database\Eloquent\Model;

class User_Perfil extends Model {

    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function Perfils() {
        return $this->belongsToMany(\App\Cadastro\Perfil::class);

    }
    public function Perfilnome() {
        $perfil = $this->Perfils();

        return $perfil ;
    }

    public function hasPermission(Permission $permission) {

        return $this->hasAnyPerfils($permission->perfils());
    }

    public function hasAnyPerfils($perfils) {
        if (is_array($perfils) || is_object($perfils)) {
            return !!$perfils->intersect($this->perfils)->count();
        }
        return $this->perfils->contains('nome', $perfils);
    }

}
