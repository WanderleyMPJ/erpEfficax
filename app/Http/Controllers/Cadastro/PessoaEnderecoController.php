<?php

namespace App\Http\Controllers\Cadastro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PessoaEnderecoController extends Controller
{
    public function salvar(\App\Http\Requests\PessoaRequest $request, $id){


        $endereco = new \App\Cadastro\PessoaEndereco;
        $endereco->descricao = $request->input('e_descricao');
        $endereco->cep = $request->input('e_cep');
        $endereco->logradouro = $request->input('e_logradouro');
        $endereco->bairro = $request->input('e_bairro');
        $endereco->cidade = $request->input('e_cidade');
        $endereco->uf = $request->input('e_uf');
        $endereco->complemento = $request->input('e_complemento');
        $endereco->referencia = $request->input('e_referencia');

        \App\Cadastro\Pessoa::find($id)->addEnderecos($endereco);

        $pessoa = \App\Cadastro\Pessoa::find($id);

        return redirect()->route('pessoa.detalhe', $pessoa->id);
    }
    public function editar($id)
    {
        $endereco = \App\Cadastro\PessoaEndereco::find($id);
        $pessoa = \App\Cadastro\Pessoa::find($endereco->pessoa_id);
        $grupo = \App\Cadastro\PessoaGrupo::all();
        $contato = '';

        return view('cadastro.pessoa',compact('contato', 'pessoa', 'grupo', 'endereco'));
    }
    public function excluir($id)
    {
        $endereco = \App\Cadastro\PessoaEndereco::find($id);
        $pessoa = \App\Cadastro\Pessoa::find($endereco->pessoa_id);
        $endereco->delete();


        return redirect()->route('pessoa.detalhe', $pessoa->id);

    }
}
