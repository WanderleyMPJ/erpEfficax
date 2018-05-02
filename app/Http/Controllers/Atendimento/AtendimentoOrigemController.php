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
        $rota = 'atendimento.origem.detalhe';
                 
        $tela = 'Origem dos Atendimentos';
        $modelfields = array('id', 'descricao');
        $add = 'atendimento.origem.cadastrar';
        $ico = 'fa-users';
        $relacao = '';
        if (Gate::denies('AtendimentoOrigem_View', $models))
            abort(403, 'Usuário não autorizado');

        return view('padrao.indexmodel', compact('models', 'headertable', 'rota', 'tela', 'modelfields', 'add', 'ico', 'relacao'));
    }

    public function detalhe($id) {
        $tipo = '0';
        $model = \App\Atendimento\AtendimentoOrigem::find($id);
        // $grupo = \App\Cadastro\PessoaGrupo::all();



        return view('cadastro.atendimento.origem.cadastrar', compact('model','tipo'));
  }

        public function cadastrar(AtendimentoOrigem $atendimentoorigem)
    {
        $tipo = '1';
        $atendimentoorigens =$atendimentoorigem->find($atendimentoorigem->id);
        // $grupo = \App\Cadastro\PessoaGrupo::all();


        if (Gate::denies('AtendimentoOrigem_Cadastrar', $atendimentoorigens) )

            abort(403,'Usuário Não autotizado');

        return view('cadastro.atendimento.origem.cadastrar', compact('atendimentoorigem','tipo'));
    }


    public function salvar(\App\Http\Requests\AtendimentoOrigemRequest $request) {

        try {
            \DB::transaction(function() use($request) {
                \App\Atendimento\AtendimentoOrigem::create($request->all());
            });
            return redirect()->route('atendimentoorigem.index');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function atualizar(\App\Http\Requests\AtendimentoOrigemRequest $request, $id) {
        \App\Atendimento\AtendimentoOrigem::find($id)->update($request->all());


        return redirect()->route('atendimentoorigem.index');
    }
    public function find(\App\Http\Requests\BuscaRequest $request){
        $term = trim($request->busca);

        if (empty($term)) {
            return \Response::json([]);
        }
        $tags = AtendimentoOrigem::search($term)->limit(5)->get();

        $formatted_tags = [];

        foreach ($tags as $tag) {
            $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->descricao];
        }

        return \Response::json($formatted_tags);
    }

}
