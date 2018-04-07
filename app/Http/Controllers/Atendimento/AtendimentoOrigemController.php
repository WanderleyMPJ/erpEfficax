<?php

namespace App\Http\Controllers\Atendimento;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Atendimento\AtendimentoOrigem;
use Gate;

class AtendimentoOrigemController extends Controller {

    public function index(AtendimentoOrigem $atendimentoorigem) {
        $models = $atendimentoorigem->all();
        $headertable = array('ID', 'Descrição', '');
        $rota = 'atendimentoorigem.detalhe';
        $tela = 'Grupo de Pessoas';
        $modelfields = array('id', 'Descricao');
        $add = 'atendimentoorigem.cadastrar';
        $ico = 'fa-users';

        if (Gate::denies('AtendimentoOrigem_View', $models))
            abort(403, 'Usuário não autorizado');

        return view('padrao.indexmodel', compact('models', 'headertable', 'rota', 'tela', 'modelfields', 'add', 'ico'));
    }

    public function detalhe($id) {
        $tipo = '0';
        $atendimentoorigem = \App\Cadastro\AtendimentoOrigem::find($id);

        return view('cadastro.atendimentoorigem', compact('atendimentoorigem', 'tipo'));
    }

    public function cadastrar(AtendimentoOrigem $atendimentoorigem) {

        $tipo = '1';
        $pessoas = $atendimentoorigem->find($atendimentoorigem->id);

        if (Gate::denies('AtendimentoOrigem_Cadastrar', $pessoas))
            abort(403, 'Usuário Não autotizado');

        return view('cadastro.atendimentoorigem', compact('atendimentoorigem', 'tipo'));
    }

    public function salvar(\App\Http\Requests\AtendimentoOrigemRequest $request) {

        try {
            \DB::transaction(function() use($request) {
                \App\Cadastro\AtendimentoOrigem::create($request->all());
            });
            return redirect()->route('atendimentoorigem.index');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function atualizar(\App\Http\Requests\AtendimentoOrigemRequest $request, $id) {
        \App\Cadastro\AtendimentoOrigem::find($id)->update($request->all());


        return redirect()->route('atendimentoorigem.index');
    }

}
