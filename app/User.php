<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function Perfils()
    {
        return $this->belongsToMany(\App\Model\Cadastro\Perfil::class);
    }
    
    public function hasPermission(Permission $permission)
    {

        return $this->hasAnyPerfils($permission->perfils);
    }

    public function hasAnyPerfils($perfils)
    {
        if (is_array($perfils) || is_object($perfils))
        {
            return !! $perfils->intersect($this->perfils)->count();
        }
        return $this->perfils->contains('nome', $perfils);

    }
}
