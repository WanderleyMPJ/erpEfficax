<?php

namespace App\Http\Controllers\Cadastro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Cadastro\Pessoa;
use Gate;

class PessoaController extends Controller
{
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
        $pessoas =$pessoa->find($pessoa->id);

        if (Gate::denies('pessoa_create', $pessoas) )
            abort(403,'Usuário Não autotizado');

        return view('cadastro.pessoa.detalhes', compact('pessoa'));
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
    public function edit(Pessoa $pessoa)
    {
        //
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
}
