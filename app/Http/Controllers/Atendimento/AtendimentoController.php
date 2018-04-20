<?php

namespace App\Http\Controllers\Atendimento;

use Illuminate\Http\Request;
use App\Http\Requests\AtendimentoRequest;
use App\Http\Controllers\Controller;
use App\Atendimento\Atendimento;
use App\Atendimento\AtendimentoSolicitacao;
use Gate;
use Carbon\Carbon; //data e hora
use Response; //valores
use Illuminate\Support\Collection;
use db;


class AtendimentoController extends Controller {

    public function index2(Request $request){
        if ($request){
            $query=trim($request->get('searchText'));
            $models = DB::table('atendimentos as e')
            -> join('pessoas as p', 'e.pessoa_id', '=', 'p.id')
            -> join('atendimento_solicitacaos as s', 'e.id', '=', 's.atendimento_id')
            -> select('e.id', 'e.data_inicio', 'p.nome')
            -> where('e.atendimentostatus_id', '=', '$query')
            -> orderby('e.data_inicio', 'desc')
            -> paginate(7);
            
             if (Gate::denies('Atendimento_View', $models))
            abort(403, 'Usuário não autorizado');

        return view('atendimento.dashboard', compact('models', 'headertable', 'rota', 'tela', 'modelfields', 'add', 'ico'));
            
        }
    }
    
    
    public function index(Atendimento $atendimento) {
        
        
        
        $models = $atendimento->all();

        $aberto = count($models->where('atendimentostatus_id', '1'));

        $headertable = array('ID', 'Descrição','Status','');
        $rota = 'atendimento.status.detalhe';
                 
        $tela = 'Listagem dos Atendimentos';
        $modelfields = array('id', 'descricao');
        $add = 'atendimento.cadastrar';
        $ico = 'fa-dashboard';
       // $relacao = $models->atendimentostatus;
        $relacao = 'atendimentostatus';
        $campo = 'descricao';
        if (Gate::denies('Atendimento_View', $models))
            abort(403, 'Usuário não autorizado');

        return view('atendimento.dashboard', compact('models', 'relacao', 'headertable', 'rota', 'tela', 'modelfields', 'add', 'ico', 'aberto', 'campo'));
        
        
        
    }

    
    public function cadastrar(Atendimento $atendimento){

        $tipo = '1';
        $atendimento =$atendimento->find($atendimento->id);
        $pessoas = \App\Cadastro\Pessoa::all();
        $atendimentostatuss = \App\Atendimento\AtendimentoStatus::all();
        $atendimentoorigens = \App\Atendimento\AtendimentoOrigem::all();

        
        if (Gate::denies('Atendimento_Cadastrar', $atendimento) )

            abort(403,'Usuário Não autotizado');

        return view('atendimento.cadastrar', compact('empresa','tipo', 'pessoas', 'atendimentostatuss', 'atendimentoorigens'));
    }
    
    
    
    
}
