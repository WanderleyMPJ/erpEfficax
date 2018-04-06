<?php

namespace App\Http\Controllers\Cadastro;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cadastro\PessoaGrupo;
use Gate;

class PessoaGrupoController extends Controller
{
    public function index(PessoaGrupo $pessoagrupo)
    {
        $models =$pessoagrupo->all();
        $headertable = array('ID','Descrição', '');
        $rota ='pessoagrupo.detalhe';
        $tela = 'Grupo de Pessoas';
        $modelfields = array('id','Descricao');
        $add = 'pessoagrupo.cadastrar';
        $ico = 'fa-users';

        if ( Gate::denies('PessoaGrupo_View', $models) )
            abort(403, 'Usuário não autorizado');

        return view('padrao.indexmodel',compact('models','headertable','rota','tela', 'modelfields', 'add', 'ico'));
    }
    public function detalhe($id)
    {
        $tipo = '0';
        $pessoagrupo = \App\Cadastro\PessoaGrupo::find($id);

        return view('cadastro.pessoagrupo', compact('pessoagrupo','tipo'));
    }
    public function cadastrar(PessoaGrupo $pessoagrupo){

        $tipo = '1';
        $pessoas =$pessoagrupo->find($pessoagrupo->id);

        if (Gate::denies('Pessoa_Cadastrar', $pessoas) )

            abort(403,'Usuário Não autotizado');

        return view('cadastro.pessoagrupo', compact('pessoagrupo','tipo'));
    }
    public function salvar(\App\Http\Requests\PessoaGrupoRequest $request){

        try{
            \DB::transaction(function() use($request){
                \App\Cadastro\PessoaGrupo::create($request->all());
            });
            return redirect()->route('pessoagrupo.index');


        } catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }
    public function atualizar(\App\Http\Requests\PessoaGrupoRequest $request, $id){
        \App\Cadastro\PessoaGrupo::find($id)->update($request->all());


        return redirect()->route('pessoagrupo.index');
    }

}
