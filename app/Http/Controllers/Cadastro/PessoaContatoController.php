<?php

namespace App\Http\Controllers\Cadastro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PessoaContatoController extends Controller
{
    public function salvar(\App\Http\Requests\PessoaRequest $request, $id)
    {
        $contato = new \App\Cadastro\PessoaContato;
        $contato->descricao = $request->input('c_descricao');
        $contato->telefone = $request->input('c_telefone');
        $contato->email = $request->input('c_email');

        \App\Cadastro\Pessoa::find($id)->addContatos($contato);

        $pessoa = \App\Cadastro\Pessoa::find($id);

        return redirect()->route('pessoa.detalhe', $pessoa->id);
    }
}
