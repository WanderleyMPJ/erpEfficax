<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;
use App\Cadastro\Permission;
use App\Funcoes;

class AuthServiceProvider extends ServiceProvider {

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot() {
        $this->registerPolicies();
              

     //   if (App\Funcoes\funcoes::verificaTabela('permissions')) {
        $this->registerPolicies();

        // IF (function () {return verificaTabela('permissions'); }) {
            //   if (App\Funcoes\funcoes::verificaTabela('permissions')) {
            $permissions = Permission::with('perfils')->get();

            foreach ($permissions as $permission) {

                Gate::define($permission->nome, function(User $user)
                        use ($permission) {
                    return $user->hasPermission($permission);
                });
            }

            Gate::before(function(User $user, $hability) {
                if ($user->hasAnyPerfils('Admin'))
                    return true;
            });

    }

}
