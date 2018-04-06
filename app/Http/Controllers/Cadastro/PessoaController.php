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
        $tabela = array('Nome','CNPJ ou CPF','RG ou Insc Estadual','Inativo', '');
        $rota ='pessoa.detalhe';
        $tela = 'Pessoas';

        if ( Gate::denies('Pessoa_View', $pessoas) )
            abort(403, 'Usuário não autorizado');

        return view('cadastro.pessoa.index',compact('pessoas','tabela','rota','tela'));
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
    public function show(\App\Http\Requests\PessoaRequest $request)
    {
        dd($request);
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
        $grupo = \App\Cadastro\PessoaGrupo::all();



        return view('cadastro.pessoa.add', compact('pessoa','grupo','tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Cadastro\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function atualizarPessoa(\App\Http\Requests\PessoaRequest $request,$id)
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
                \App\Cadastro\Pessoa::find($id)->update($campos);

                $contato['pessoa_id'] =  $id;
                $contato['descricao'] = $request->input('c_descricao');
                $contato['telefone'] = $request->input('c_telefone');
                $contato['email'] = $request->input( 'c_email');

             /*   \App\Cadastro\PessoaContato::create($contato);

                $endereco['pessoa_id'] = $pessoa->id;
                $endereco['descricao'] = $request->input('e_descricao');
                $endereco['cep'] = $request->input('e_cep');
                $endereco['logradouro'] = $request->input('e_logradouro');
                $endereco['bairro'] = $request->input('e_bairro');
                $endereco['cidade'] = $request->input('e_cidade');
                $endereco['uf'] = $request->input('e_uf');
                $endereco['complemento'] = $request->input('e_complemento');
                $endereco['referencia'] = $request->input('e_referencia');

                \App\Cadastro\PessoaEndereco::create($endereco);

                foreach($request->get('grupo') as $grupoid) {

                    $grupo['pessoa_id'] = $pessoa->id;
                    $grupo['pessoagrupo_id'] = $grupoid;

                    \App\Cadastro\PessoaXGrupo::create($grupo);
                }*/

            });
            return redirect()->route('pessoa.index');

        } catch (\Exception $e) {
            return $e->getMessage();
        }





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

                \App\Cadastro\PessoaContato::create($contato);

               $endereco['pessoa_id'] = $pessoa->id;
               $endereco['descricao'] = $request->input('e_descricao');
               $endereco['cep'] = $request->input('e_cep');
               $endereco['logradouro'] = $request->input('e_logradouro');
               $endereco['bairro'] = $request->input('e_bairro');
               $endereco['cidade'] = $request->input('e_cidade');
               $endereco['uf'] = $request->input('e_uf');
               $endereco['complemento'] = $request->input('e_complemento');
               $endereco['referencia'] = $request->input('e_referencia');

                \App\Cadastro\PessoaEndereco::create($endereco);

               foreach($request->get('grupo') as $grupoid) {

                   $grupo['pessoa_id'] = $pessoa->id;
                   $grupo['pessoagrupo_id'] = $grupoid;

                   \App\Cadastro\PessoaXGrupo::create($grupo);
               }

            });
            return redirect()->route('pessoa.index');

        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }
}
