<?php

namespace App\Http\Controllers\Cadastro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PessoaContatoController extends Controller
{
    public function atualizar(\App\Http\Requests\PessoaRequest $request, $id)
    {

        $contato['descricao'] = $request->input('c_descricao');
        $contato['telefone'] = $request->input('c_telefone');
        $contato['email'] = $request->input('c_email');
        \App\Cadastro\PessoaContato::find($id)->update($contato);

        $contato = \App\Cadastro\Pessoacontato::find($id);

        $pessoa = \App\Cadastro\Pessoa::find($contato->pessoa_id);

        return redirect()->route('pessoa.detalhe', $pessoa->id);
    }
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

    public function editar($id)
    {
        $contato = \App\Cadastro\PessoaContato::find($id);
        $pessoa = \App\Cadastro\Pessoa::find($contato->pessoa_id);
        $grupo = \App\Cadastro\PessoaGrupo::all();
        $endereco = '';

        return view('cadastro.pessoa',compact('contato', 'pessoa', 'grupo', 'endereco'));
    }
    public function excluir($id)
    {
        $contato = \App\Cadastro\PessoaContato::find($id);
        $pessoa = \App\Cadastro\Pessoa::find($contato->pessoa_id);
        $contato->delete();


        return redirect()->route('pessoa.detalhe', $pessoa->id);

    }

}
