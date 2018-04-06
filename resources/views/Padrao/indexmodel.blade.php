@extends('adminlte::page')

@section('content_header')
    <section class="content-header">
        <h1 class="text-red">
           <i class="fa {{$ico}}"></i> {{$tela}}
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
            <a  class="btn btn-success" href="{{ route($add) }}"> <i class="fa fa-plus"></i> Adicionar </a>
        </div>
    </div>

    <div class="box-body">
        <div class="widget-content nopadding">
            <table class="table table-striped table-bordered datatables" style="width:100%">
                        <thead>
                        <tr>
                           {{-- <th><i class="icon-resize-vertical"></i></th>--}}
                            @forelse($headertable as $header)
                                <th>{{$header}}</th>
                                @empty
                                <p>Informe os Campos da tabela</p>
                            @endforelse
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($models as $model)

                            <tr>
                           {{--     <td><input type="checkbox" /></td>--}}
                                @forelse($modelfields as $modelfield)
                                <td>{{$model->$modelfield}}</td>
                                @empty
                                    <p>Informe os Campos da tabela</p>
                                @endforelse
                              {{--  <td>{{$model->cnpj_cpf}}</td>
                                <td>{{$model->rg_inscest}}</td>--}}

                              {{--  @if($model->ativo == 0)
                                    <td><input type="checkbox"  checked="checked" disabled/></td>
                                @elseif($model->ativo == 1)
                                    <td><input type="checkbox" disabled/></td>
                                @endif--}}
                                <td>
                                    <div class="pull-left">
                                        <a  class="btn btn-info" href="{{route($rota,$model->id)}}"> <i class="fa fa-edit"></i> Editar </a>
                                    </div>
                            </tr>
                        @empty
                            <p>Nenhuma {{$tela}} Encontrada...</p>
                        @endforelse
                        </tbody>
                    </table>
 {{--           <div class="box-footer">{!! $models->links() !!}</div>--}}
        </div>
    </div>
</div>

@stop