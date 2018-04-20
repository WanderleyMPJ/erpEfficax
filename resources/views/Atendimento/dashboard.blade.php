@extends('adminlte::page')

@section('content_header')
<section class="content-header">
    <h1 class="text-green">
        <i class="fa {{$ico}}"></i> Dashboard Atendimentos
        {{--<small>it all starts here</small>--}}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('atendimento.dashboard')}}">Listagem de Origens</a></li>
        <li class="active">Cadastro</li>
    </ol>
</section>
@stop

@section('content')

<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{$aberto}}</h3>

                <p>Abertos</p>
            </div>
            <div class="icon">
                <i class="fa fa-folder-open"></i>
            </div>
            <a href="#" class="small-box-footer">Visualizar <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>44</h3>

                <p>Com Minha Equipe</p>
            </div>
            <div class="icon">
                <i class="fa fa-group"></i>
            </div>
            <a href="#" class="small-box-footer">Visualizar <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Agendados</p>
            </div>
            <div class="icon">
                <i class="fa fa-calendar"></i>
            </div>
            <a href="#" class="small-box-footer">Visualizar <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>65</h3>

                <p>Atrasados</p>
            </div>
            <div class="icon">
                <i class="fa fa-calendar-times-o"></i>
            </div>
            <a href="#" class="small-box-footer">Visualizar <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>

<!-- listagem -->

       <div class="box">

    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-list"></i> Meus Atendimentos</h3>
        <br><br>
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
                                @if($relacao <> '')

                                    <td>{{$model->$relacao->$campo}}</td>
                                    @else
                                    @endif

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