@extends('adminlte::page')

@section('content_header')
    <section class="content-header">
        <h1>
           <i class="fa fa-user"></i>{{$tela}}
            {{--<small>it all starts here</small>--}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            {{--<li><a href="#">Pessoas</a></li>--}}
            <li class="active">{{$tela}}</li>
        </ol>
    </section>
@stop

@section('content')
   <div class="box">

    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-list"></i> Listagem</h3>
        <br><br>
        {{--<form action="" method="post" class="form form-inline">
            <input type="text" name="nome" class="form-control" placeholder="Nome">
            <input type="text" name="cnpj_cpf" class="form-control" placeholder="CPF ou CNPJ">

            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Pesquisar</button>
       --}}{{-- <a class="btn btn-success"><i class="fa fa-plus"></i> Adicionar</a>--}}{{--
        </form>--}}
        <div class="box-tools">
            <a  class="btn btn-box-tool" href="{{ route('pessoa.cadastro') }}"> <i class="fa fa-plus"></i> Adicionar </a>
        </div>
    </div>

    <div class="box-body">
        <div class="widget-content nopadding">
            <table class="table table-striped table-bordered datatables" style="width:100%">
                        <thead>
                        <tr>
                           {{-- <th><i class="icon-resize-vertical"></i></th>--}}
                            @forelse($tabela as $tb)
                                <th>{{$tb}}</th>
                                @empty
                                <p>Informe os Campos da tabela</p>
                            @endforelse
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

                                        <a href="{{route($rota,$pessoa->id)}}" class="btn" title="Edit Task"><i class="fa fa-edit">Editar</i></a>
                                    </div>
                            </tr>
                        @empty
                            <p>Nenhuma Pessoa Encontrada...</p>
                        @endforelse
                        </tbody>
                    </table>
 {{--           <div class="box-footer">{!! $pessoas->links() !!}</div>--}}
        </div>
    </div>
</div>

@stop