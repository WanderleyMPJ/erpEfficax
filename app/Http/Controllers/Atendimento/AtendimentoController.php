<?php

namespace App\Http\Controllers\Atendimento;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Atendimento\Atendimento;
use Gate;
use Carbon\Carbon; //data e hora
use Response; //valores
use Illuminate\Support\Collection;
use db;


class AtendimentoController extends Controller {


    
    public function index(Atendimento $atendimento) {

        $models = $atendimento->all();

        $aberto = count($models->where('atendimentostatus_id', '1'));
        $rota = 'atendimento.status.detalhe';
        $tela = 'Listagem dos Atendimentos';
        $add = 'atendimento.cadastrar';
        $ico = 'fa-dashboard';
        if (Gate::denies('Atendimento_View', $models))
            abort(403, 'Usuário não autorizado');

        return view('atendimento.dashboard', compact('models', 'rota', 'tela', 'add', 'ico', 'aberto'));
        
        
        
    }
    public function cadastrar(Atendimento $atendimento){

        $atendimentos = $atendimento->find($atendimento->id);
        $origens = \App\Atendimento\AtendimentoOrigem::all();
        $titulo = 'Novo Atendimento';
        
        if (Gate::denies('Atendimento_Cadastrar', $atendimentos) )

            abort(403,'Usuário Não autotizado');

        return view('atendimento.cadastrar', compact('titulo', 'atendimento', 'origens'));
    }
    public function salvar(\App\Http\Requests\AtendimentoRequest $request){
       $dt_inicio =    $this->databanco($request->input('data_hora_inicio'));
       $atendimento = $request->only([
            'data_hora_inicio',
            'pessoa_id',
            'atendente_id',
            'solicitante',
            'atendimentoorigem_id',
            'solicitacao',
            'solucao',
            'atendimentostatus_id'

        ]);
       $atendimento['data_inicio'] = $dt_inicio;
        $atendimento_det = $request->only([
            'acao',
        ]);
        $atendimento = \App\Atendimento\Atendimento::create($atendimento);

        $atendimento = \App\Atendimento\Atendimento::find($atendimento->id);

        $atendimento->addAtendimentoDet($atendimento_det);
        

        \App\Atendimento\AtendimentoSolicitacaoMov::create($solicitacao_mov);


        return redirect()->route('atendimento.dashboard');

    }
    
    
}
