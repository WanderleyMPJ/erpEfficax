@extends('adminlte::page')

@section('content_header')
    <section class="content-header">
        <h1 class="text-green">
            <i class="fa fa-users"></i> Grupo de Pessoas
            {{--<small>it all starts here</small>--}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('pessoa.index')}}">Grupo de Pessoas</a></li>
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
                    <form class="form-horizontal" action="{{'pessoagrupo.salvar'}}">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="inputEmail3">Descrição:</label>

                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Descrição" name="descricao">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button class="btn btn-default" type="reset">Cancelar</button>
                            <button class="btn btn-info pull-right" type="submit">Salvar</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
            </div>
        </div>
    </div>

@stop