@extends('layouts._menu')
@section('menutop')
<div id="content-header">
    <div id="breadcrumb"> <a href="{{ route('home') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('pessoa.index') }}" class="current">Pessoa</a> </div>
</div>
@endsection
@section('content')
    
    <div class="quick-actions_homepage">
        <ul class="quick-actions">
            <li class="bg_lb"> <a href="{{ route('pessoa.cadastro') }}"> <i class="icon-plus"></i> Adicionar </a> </li>
        </ul>
    </div>
<div class="widget-box">
    <div class="widget-title"> <span class="icon"><input type="checkbox" id="title-checkbox" name="title-checkbox"></span>
        <h5>Listagem Pessoas</h5>
    </div>
    <div class="widget-content nopadding">
    <table class="table table-bordered data-table with-check">
        <thead>
            <tr>
                <th><i class="icon-resize-vertical"></i></th>
                <th>Nome</th>
                <th>CNPJ ou CPF</th>
                <th>RG ou Insc Estadual</th>
                <th>Inativo</th>
               <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($pessoas as $pessoa)
            
            <tr>
                <td><input type="checkbox" /></td>
                <td>{{$pessoa->nome}}</td>
                <td>{{$pessoa->cnpj_cpf}}</td>
                <td>{{$pessoa->rg_inscest}}</td>
                @if($pessoa->ativo == 0)
                <td><input type="checkbox"  checked="checked" disabled/></td>
                @elseif($pessoa->ativo == 1)
                <td><input type="checkbox" disabled/></td>
                @endif
                <td>
                    <div class="pull-left">
                        <a href="{{route('pessoa.detalhe',$pessoa->id)}}" title="Edit Task"><i class="icon-pencil">Editar</i></a>
                    </div>
            </tr>
            @empty
            <p>Nenhuma Pessoa Encontrada...</p>
            @endforelse
            </tbody>
    </table>
</div>
</div>
@endsection
