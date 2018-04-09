<?php

namespace App\Http\Controllers\Cadastro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cadastro\Empresa;
use Gate;


class EmpresaController extends Controller {

    public function index(Empresa $empresa) {
        $models = $empresa->all();
        $headertable = array('ID','Nome', 'Pessoa', '');
        $rota ='empresa.detalhe';
        $tela = 'Empresas';
        $modelfields = array('id','descricao');
        $relacao = 'pessoa';
        $campo = 'nome';
        $add = 'empresa.cadastrar';
        $ico = 'fa-users';

        if (Gate::denies('empresa_view', $empresa))
            abort(403, 'Usuário não autorizado');

        return view('padrao.indexmodel',compact('models','headertable','rota','tela', 'modelfields', 'add', 'ico', 'relacao', 'campo'));
    }
    public function detalhe($id)
    {
        $tipo = '0';
        $empresa = \App\Cadastro\Empresa::find($id);
        $pessoas = \App\Cadastro\Pessoa::all();

        return view('cadastro.empresa', compact('empresa','tipo', 'pessoas'));
    }
    public function cadastrar(Empresa $empresa){

        $tipo = '1';
        $empresa =$empresa->find($empresa->id);
        $pessoas = \App\Cadastro\Pessoa::all();

        if (Gate::denies('Empresa_Cadastrar', $empresa) )

            abort(403,'Usuário Não autotizado');

        return view('cadastro.empresa', compact('empresa','tipo', 'pessoas'));
    }
    public function salvar(\App\Http\Requests\EmpresaRequest $request){

        try{
            \DB::transaction(function() use($request){
                \App\Cadastro\Empresa::create($request->all());
            });
            return redirect()->route('empresa.index');


        } catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }
    public function atualizar(\App\Http\Requests\EmpresaRequest $request, $id){


        \App\Cadastro\Empresa::find($id)->update($request->all());


        return redirect()->route('empresa.index');
    }

}
