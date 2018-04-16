<?php

namespace App\Http\Controllers\Cadastro;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cadastro\Pessoa;
use Gate;
use zServices\ReceitaFederal\Search as ReceitaFederal;

class PessoaController extends Controller
{
  public function index(Pessoa $pessoa)
    {
        $models =$pessoa->all();
        $headertable = array('Nome','CNPJ ou CPF','RG ou Insc Estadual', '');
        $rota ='pessoa.detalhe';
        $tela = 'Pessoas';
        $modelfields = array('nome','cnpj_cpf','rg_inscest');
        $add = 'pessoa.cadastrar';
        $ico = 'fa-user';
        $relacao = '';
        $campo = '';

        if ( Gate::denies('Pessoa_View', $models) )
            abort(403, 'Usuário não autorizado');

        return view('padrao.indexmodel',compact('modelfields','headertable','rota','tela', 'models', 'add', 'ico', 'relacao', 'campo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cadastrar(Pessoa $pessoa)
    {
        $pessoas =$pessoa->find($pessoa->id);
        $grupo = \App\Cadastro\PessoaGrupo::all();


        if (Gate::denies('Pessoa_Cadastrar', $pessoas) )

            abort(403,'Usuário Não autotizado');

        return view('cadastro.pessoa', compact('pessoa','grupo'));
    }

    public function detalhe($id)
    {
        $pessoa = \App\Cadastro\Pessoa::find($id);
        $grupo = \App\Cadastro\PessoaGrupo::all();
        $contato = '';
        $endereco = '';
        return view('cadastro.pessoa', compact('pessoa','grupo', 'contato', 'endereco'));
    }
    public function atualizar(\App\Http\Requests\PessoaRequest $request,$id)
    {
     try{
            \DB::transaction(function() use($request, $id){

                $campos = $request->only([
                    'nome',
                    'rg_inscest',
                    'cnpj_cpf',
                    'tipo_pessoa',
                    'fantasia',
                ]);
                if($request->input('ativo')== ''){
                    $campos['ativo']=1;
                }else{
                    $campos['ativo']=$request->input('ativo');
                };
            });
            return redirect()->route('pessoa.index');

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function salvar(\App\Http\Requests\PessoaRequest $request){

                $campos = $request->only([
                    'nome',
                    'rg_inscest',
                    'cnpj_cpf',
                    'tipo_pessoa',
                    'fantasia',
                    'ativo',
                ]);
                $pessoa = \App\Cadastro\Pessoa::create($campos);


            if($request->get('grupo') <> ''){

               foreach($request->get('grupo') as $grupoid)
               {
                   $grupo['pessoa_id'] = $pessoa->id;
                   $grupo['pessoagrupo_id'] = $grupoid;

                   \App\Cadastro\PessoaXGrupo::create($grupo);
               }
            }
         return redirect()->route('pessoa.detalhe', $pessoa->id);
    }

}
