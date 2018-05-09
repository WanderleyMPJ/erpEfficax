<?php

namespace App\Http\Controllers\Financeiro;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Financeiro\Mov;
use Gate;


class MovController extends Controller
{
    public function index(Mov $servico)
    {

        if ( Gate::denies('Mov_View', $models) )
            abort(403, 'Usuário não autorizado');

        return view('padrao.indexmodel',compact('models','headertable','rota','tela', 'modelfields', 'add', 'ico', 'relacao', 'campo'));
    }
    
    public function detalhe($id)
    {
        $tipo = '0';
        $servico = \App\Financeiro\Mov::find($id);

        return view('cadastro.servico', compact('servico','tipo'));
    }
    
    public function lancamento(Mov $mov){

        $ico = 'fa-bank';
        $tela = 'Lançamento Financeiro';
        
        if (Gate::denies('Mov_lancamento', $mov) )

            abort(403,'Usuário Não autotizado');

        return view('financeiro.lancamento', compact('mov', 'ico', 'tela'));
    }
 
    
    public function salvar(\App\Http\Requests\MovRequest $request){

        try{
            \DB::transaction(function() use($request){
                \App\Financeiro\Mov::create($request->all());
            });
            return redirect()->route('servico.index');


        } catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }
    public function atualizar(\App\Http\Requests\MovRequest $request, $id){
        \App\Financeiro\Mov::find($id)->update($request->all());


        return redirect()->route('servico.index');
    }

}
