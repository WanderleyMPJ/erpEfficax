@extends('adminlte::page')

@section('content_header')
<section class="content-header">
    <h1 class="text-green">
        <i class="fa {{$ico}}"></i> Dashboard Atendimentos
        {{--<small>it all starts here</small>--}}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('atendimento.dashboard')}}">Atendimentos</a></li>
    </ol>
</section>
@stop

@section('content')
{{--    <div class="row">
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
    </div>--}}
    <div class="row">
        <a href="{{ route($add) }}">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-green">
                 <span class="info-box-icon"><i class="fa fa-plus"></i></span>

                <div class="info-box-content">
                    <span class="info-box-number">Novo</span>
                    <span class="info-box-number">Atendimento</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        </a>
        <!-- /.col -->
        <a href="#">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-teal">
                    <span class="info-box-icon"><i class="fa fa-map-pin"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-number">Consultar</span>
                        <span class="info-box-number">Atendimento</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </a>
        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <a href="#">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-yellow">
                    <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-number">Minha</span>
                        <span class="info-box-number">Agenda</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </a>
        <!-- /.col -->
        <a href="#">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-olive">
                    <span class="info-box-icon"><i class="fa fa-money"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-number">Faturar</span>
                        <span class="info-box-number">Atendiemento</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </a>
        <!-- /.col -->
    </div>


<!-- listagem -->

       <div class="box">

    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-list"></i> Listagem de Atendimentos</h3>
        <br><br>
    </div>

    <div class="box-body">
        <div class="widget-content nopadding">
            <table class="table table-striped table-bordered datatables" style="width:100%">
                        <thead>
                        <tr>
                           {{-- <th><i class="icon-resize-vertical"></i></th>--}}
                            <th>ID</th>
                            <th>Início</th>
                            <th>Pessoa</th>
                        {{--    <th>Status</th>--}}
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($models as $model)
                            <tr>
                                <td>{{$model->id}}</td>
                                <td>{{$model->data_inicio->format('d/m/Y H:i')}}</td>
                                <td>{{$model->pessoa->nome}}</td>
                                <td>
                                    <div class="pull-left">
                                        <a  class="btn btn-warning" href="{{route($rota,$model->id)}}"> <i class="fa fa-clock-o"></i> Histórico </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <p>Nenhum {{$tela}} Aberto...</p>
                        @endforelse
                        </tbody>
                    </table>
 {{--           <div class="box-footer">{!! $models->links() !!}</div>--}}
        </div>
    </div>
</div>


@stop