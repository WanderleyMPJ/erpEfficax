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
    public function getCnpj() {
        return view('cadastro.pessoa.cnpj');
    }
    
    
    public function index(Pessoa $pessoa)
    {
        $pessoas =$pessoa->all();
        //  $pessoas = $pessoa->where('user_id', auth()->user()->id)->get();


        if ( Gate::denies('pessoa_view', $pessoas) )
            abort(403, 'Usuário não autorizado');

        return view('cadastro.pessoa.index',compact('pessoas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pessoa $pessoa)
    {
        $tipo = '1';
        $pessoas =$pessoa->find($pessoa->id);
        $grupo = \App\Cadastro\PessoaGrupo::all();


        if (Gate::denies('Pessoa_Cadastrar', $pessoas) )

            abort(403,'Usuário Não autotizado');

        return view('cadastro.pessoa.add', compact('pessoa','grupo','tipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Cadastro\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function show(Pessoa $pessoa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Cadastro\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function detalhe($id)
    {
        $tipo = '0';
        $pessoa = \App\Cadastro\Pessoa::find($id);
        return view('Cadastro.Pessoa.add',compact('pessoa','tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Cadastro\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pessoa $pessoa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Cadastro\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pessoa $pessoa)
    {
        //
    }

    public function novaPessoa(\App\Http\Requests\PessoaRequest $request){
       dd($request->all());

        try{
            \DB::transaction(function() use($request){

                $campos = $request->only([
                    'nome',
                    'rg_inscest',
                    'cnpj_cpf',
                    'tipo_pessoa',
                    'fantasia',
                    'ativo',
                ]);
                $pessoa = \App\Cadastro\Pessoa::create($campos);

                $contato['pessoa_id'] =  $pessoa->id;
                $contato['descricao'] = $request->input('c_descricao');
                $contato['telefone'] = $request->input('c_telefone');
                $contato['email'] = $request->input( 'c_email');

                \App\Cadastro\Pessoa_Contato::create($contato);

               $endereco['pessoa_id'] = $pessoa->id;
               $endereco['descricao'] = $request->input('e_desc');
               $endereco['cep'] = $request->input('e_cep');
               $endereco['rua'] = $request->input('e_rua');
               $endereco['num'] = $request->input('e_num');
               $endereco['bairro'] = $request->input('e_bairro');
               $endereco['cidade'] = $request->input('e_cidade');
               $endereco['estado'] = $request->input('e_estado');

                \App\Cadastro\Pessoa_Endereco::create($endereco);

                $grupo['pessoa_id'] = $pessoa->id;
                $grupo['grupo_id'] = $request->input('grupo');

                \App\Cadastro\Pessoa_Grupo::create($grupo);

            });
            return redirect()->route('pessoa.index');

        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }
}
