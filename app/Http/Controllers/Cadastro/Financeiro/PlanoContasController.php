<?php

namespace App\Http\Controllers\Cadastro\Financeiro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cadastro\financeiro\PlanoConta;
use Illuminate\Support\Facades\DB;

class PlanoContasController extends Controller
{
    public function index()
    {
        $planocontas = PlanoConta::where('parent_id', '=', 0)->get();
        $allplanocontas = PlanoConta::pluck('descricao', 'id')->all();


        return view('Cadastro.Financeiro.PlanoContas.index',compact('planocontas','allplanocontas'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function Salvar(Request $request)
    {
        $this->validate($request, [
            'descricao' => 'required',
        ]);
        $input = $request->all();



        ;

    IF (empty($input['parent_id']) ) { $conta='';}
        else
            {$contas = PlanoConta::where('id', '=', $input['parent_id'])->get();
                $conta= $contas[0]->codconta;
            }



        $input['codconta']= empty($input['codconta']) ? $input['id'] :
               empty($input['parent_id']) ? $input['codconta']: $conta.'.'.$input['codconta'];
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];


        PlanoConta::create($input);
        return back()->with('successo', 'Nova Conta Plano de Contas adicionada com Sucesso.');
    }}
