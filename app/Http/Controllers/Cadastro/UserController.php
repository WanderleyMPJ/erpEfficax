<?php

namespace App\Http\Controllers\Cadastro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Gate;

class UserController extends Controller {

    public function index(User $user) {
        $users = $user->all();
        //  $users = $user->where('user_id', auth()->user()->id)->get();

        $models = $user->all();
        $headertable = array('Nome', 'E-mail', '');
        $rota = 'register';
        $tela = 'Usuarios';
        $modelfields = array('name', 'email');
        $add = 'register';
        $ico = 'fa-user';
        $relacao = '';
        $campo = '';

        if (Gate::denies('User_View', $models))
            abort(403, 'Usuário não autorizado');

        return view('padrao.indexmodel', compact('modelfields', 'headertable', 'rota', 'tela', 'models', 'add', 'ico', 'relacao', 'campo'));
    }

    public function userpermissions() {
        $nameuser = auth()->user()->name;
        //   var_dump("<h1>{$nameuser}</h1>");
        foreach (auth()->user()->perfils as $perfil) {
            echo "<b> $perfil->nome </b>";

            $permissions = $perfil->permissions;
            foreach ($permissions as $permission) {
                echo "- $permission->nome";
            }

            echo '<hr>';
        }
    }

}
