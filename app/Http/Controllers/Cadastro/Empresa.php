<?php

namespace App\Http\Controllers\Cadastro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Empresa extends Controller {

    public function index(Empresa $empresa) {
        $empresas = $empresa->all();

        if (Gate::denies('empresa_view', $empresas))
            abort(403, 'Usuário não autorizado');

        return view('cadastro.empresa.index', compact('empresas'));
    }

}
