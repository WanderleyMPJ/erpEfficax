<?php

namespace App\Http\Controllers\Atendimento;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Atendimento\AtendimentoStatus;
use Gate;

class AtendimentoStatusController extends Controller {

    public function index(AtendimentoStatus $atendimentostatus) {
        $models = $atendimentostatus->all();
        $headertable = array('ID', 'Descrição', '');
        $rota = 'atendimento.status.detalhe';
                 
        $tela = 'Status dos Atendimentos';
        $modelfields = array('id', 'descricao');
        $add = 'atendimento.status.cadastrar';
        $ico = 'fa-users';

        if (Gate::denies('AtendimentoStatus_View', $models))
            abort(403, 'Usuário não autorizado');

        return view('padrao.indexmodel', compact('models', 'headertable', 'rota', 'tela', 'modelfields', 'add', 'ico'));
    }

    public function detalhe($id) {
        $tipo = '0';
        $model = \App\Atendimento\AtendimentoStatus::find($id);
        // $grupo = \App\Cadastro\PessoaGrupo::all();



        return view('cadastro.atendimento.status.cadastrar', compact('model','tipo'));
  }

        public function cadastrar(AtendimentoStatus $atendimentostatus)
    {
        $tipo = '1';
        $atendimentoorigens =$atendimentostatus->find($atendimentostatus->id);
        // $grupo = \App\Cadastro\PessoaGrupo::all();


        if (Gate::denies('AtendimentoStatus_Cadastrar', $atendimentoorigens) )

            abort(403,'Usuário Não autotizado');

        return view('cadastro.atendimento.status.cadastrar', compact('atendimentostatus','tipo'));
    }


    public function salvar(\App\Http\Requests\AtendimentoStatusRequest $request) {

        try {
            \DB::transaction(function() use($request) {
                \App\Atendimento\AtendimentoStatus::create($request->all());
            });
            return redirect()->route('atendimento.status.index');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function atualizar(\App\Http\Requests\AtendimentoStatusRequest $request, $id) {
        \App\Atendimento\AtendimentoStatus::find($id)->update($request->all());


        return redirect()->route('atendimento.status.index');
    }

}
