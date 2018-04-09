@extends('adminlte::page')

@section('content_header')
    <section class="content-header">
        <h1 class="text-green">
            <i class="fa fa-users"></i> Status dos Atendimentos
            {{--<small>it all starts here</small>--}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('atendimento.status.index')}}">Listagem dos Status de Atendimentos</a></li>
            <li class="active">Cadastro</li>
        </ol>
    </section>
@stop

@section('content')
    <div class="box box-info">

        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-plus"></i> Cadastro</h3>
            <br>
            <hr>

        </div>

        <div class="box-body">
            <div class="widget-content nopadding">
                    <form class="form-horizontal"
                          @if($tipo == '0')
                          action="{{route('atendimento.status.atualizar', $model->id)}}"
                          @else
                          action="{{route('atendimento.status.salvar')}}"
                            @endif>
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="desc">Descrição:</label>

                                <div class="col-sm-10">
                                    <input class="form-control"  id="desc" type="text" placeholder="Descrição" name="descricao"
                                           @if($tipo == '0')
                                           value="{{$model->descricao}}"
                                           @else
                                           @endif>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button class="btn btn-default" type="reset">Cancelar</button>
                            <button type="submit" class="btn btn-info pull-right">Salvar</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
            </div>
        </div>
    </div>

@stop