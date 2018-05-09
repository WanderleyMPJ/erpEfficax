<?php

namespace App\Http\Controllers\Cadastro;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Cadastro\Servico;
use Gate;


class ServicoController extends Controller
{
    public function index(Servico $servico)
    {
        $models =$servico->all();
        $headertable = array('ID','Descrição', '');
        $rota ='servico.detalhe';
        $tela = 'Listagem de Serviços';
        $modelfields = array('id','Descricao');
        $add = 'servico.cadastrar';
        $ico = 'fa-users';
        $relacao = '';
        $campo = '';

        if ( Gate::denies('Servico_View', $models) )
            abort(403, 'Usuário não autorizado');

        return view('padrao.indexmodel',compact('models','headertable','rota','tela', 'modelfields', 'add', 'ico', 'relacao', 'campo'));
    }
    public function detalhe($id)
    {
        $tipo = '0';
        $servico = \App\Cadastro\Servico::find($id);

        return view('cadastro.servico', compact('servico','tipo'));
    }
    public function cadastrar(Servico $servico){

        $tipo = '1';
        $pessoas =$servico->find($servico->id);

        if (Gate::denies('Servico_Cadastrar', $pessoas) )

            abort(403,'Usuário Não autotizado');

        return view('cadastro.servico', compact('servico','tipo'));
    }
    public function salvar(\App\Http\Requests\ServicoRequest $request){

        try{
            \DB::transaction(function() use($request){
                \App\Cadastro\Servico::create($request->all());
            });
            return redirect()->route('servico.index');


        } catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }
    public function atualizar(\App\Http\Requests\ServicoRequest $request, $id){
        \App\Cadastro\Servico::find($id)->update($request->all());


        return redirect()->route('servico.index');
    }

}
