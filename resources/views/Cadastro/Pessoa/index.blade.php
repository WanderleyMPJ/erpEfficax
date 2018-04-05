@extends('adminlte::page')

@section('content_header')
<div id="content-header">
    <div id="breadcrumb"> <a href="{{ route('home') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('pessoa.index') }}" class="current">Pessoa</a> </div>
</div>
@stop

@section('content')
   <div class="box">

    <div class="box-header">
        <h3 class="box-title">Listagem Pessoas</h3>
        <br><br>
        <form action="" method="post" class="form form-inline">
            <input type="text" name="nome" class="form-control" placeholder="Nome">
            <input type="text" name="cnpj_cpf" class="form-control" placeholder="CPF ou CNPJ">

            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </form>
        <div class="box-tools">
            <a  class="btn btn-box-tool" href="{{ route('pessoa.cadastro') }}"> <i class="fa fa-plus"></i> Adicionar </a>
        </div>
    </div>

    <div class="box-body">

        <div class="widget-content nopadding">
                    <table id="example1" class="table table-bordered table-striped" role="grid" aria-describedby="example1_info">
                        <thead>
                        <tr>
                           {{-- <th><i class="icon-resize-vertical"></i></th>--}}
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
                           {{--     <td><input type="checkbox" /></td>--}}
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
                                        <a href="{{route('pessoa.detalhe',$pessoa->id)}}" class="btn" title="Edit Task"><i class="fa fa-edit">Editar</i></a>
                                    </div>
                            </tr>
                        @empty
                            <p>Nenhuma Pessoa Encontrada...</p>
                        @endforelse
                        </tbody>
                    </table>
            <div class="box-footer">{!! $pessoas->links() !!}</div>
        </div>
    </div>
</div>
@stop