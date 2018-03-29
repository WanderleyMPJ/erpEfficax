<?php

namespace App\Http\Controllers\Cadastro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Gate;

class UserController extends Controller
{
    public function index(User $user)
    {
        $users =$user->all();
        //  $users = $user->where('user_id', auth()->user()->id)->get();


        if ( Gate::denies('user_view', $users) )
            abort(403, 'Usuário não autorizado');

        return view('auth.index',compact('users'));
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
