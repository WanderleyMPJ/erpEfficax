<?php

namespace App\Http\Controllers\Cadastro;

use Illuminate\Http\Request;
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

        if ( Gate::denies('PessoaGrupo_View', $models) )
            abort(403, 'Usuário não autorizado');

        return view('padrao.indexmodel',compact('models','headertable','rota','tela', 'modelfields'));
    }
    public function detalhe($id)
    {
        $tipo = '0';
        $pessoa = \App\Cadastro\Pessoa::find($id);
        $grupo = \App\Cadastro\PessoaGrupo::all();



        return view('cadastro.pessoa.add', compact('pessoa','grupo','tipo'));
    }

}
