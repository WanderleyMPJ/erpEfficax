<?php

namespace App\Http\Controllers\Cadastro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PessoaContato extends Controller
{
    public function salvar(\App\Http\Requests\ContatoRequest $request,$id)
    {
        $telefone = new \App\Telefone;
        $telefone->descicao = $request->input('c_descricao');
        $telefone->telefone = $request->input('c_telefone');
        $telefone->email = $request->input('c_email');

        \App\Cadastro\Pessoa::find($id)->addContatos($telefone);

        \Session::flash('flash_message',[
            'msg'=>"Telefone adicionado com Sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('pessoa.index');

    }
}
