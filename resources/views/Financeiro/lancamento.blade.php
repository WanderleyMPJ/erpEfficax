@extends('adminlte::page')

@section('content_header')
<section class="content-header">
    <h1 class="text-red">
        <i class="fa {{$ico}}"></i> {{$tela}}
        {{--<small>it all starts here</small>--}}
            </h1>
            <ol class="breadcrumb">
    <li>        <a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        {{--<li><a href="#">Financeiro</a></li>--}}
                <li class="active">{{$tela}}</li>
            </ol>
    </section>
@stop

@section('content')

<div class="hide"> <!-- nao aparece na tela -->
     {{date_default_timezone_set('America/Porto_Velho')}}
</div>
     
  


<form rol="form"
              @if($mov->id <> '')
              action="{{route('mov.atualizar', $mov->id)}}"
              @else
              action="{{ route('mov.salvar') }}"
              @endif
              method="get">
              <div class="invisible">
    <inp        ut type="checkbox" value="debito"  id="tp_lancto" name="tp_lancto" checked>
    </div>
    <div class="box box-default">
        <div class="widget-content nopadding">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <i class="fa fa-sticky-note"></i> Dados Básicos
                    </h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" type="button" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="checkboxes">
                            Tipo de Lançamento:
                        </label>
                        <div data-toggle="buttons-radio" class="btn-group">
                            <button
                                @if($mov->id <> '' && $mov->tp_lancto == 'debito')
                                class="btn btn-danger active"
                                @else
                                class="btn btn-danger"
                                @endif
                                onclick="mov('0')" type="button">
                                <i class="fa fa-user"></i> Débito
                            </button>

                            <button
                                @if($mov->id <> '' && $mov->tp_lancto == 'credito')
                                class="btn btn-primary active"
                                @else
                                @if($mov->id == '')
                                class="btn btn-primary active"
                                @else
                                class="btn btn-primary"
                                @endif
                                @endif
                                onclick="pessoa('1')" type="button">
                                <i class="fa fa-legal">

                                </i> Crédito
                            </button>
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="row">
                            <div class="col-md-2">
                                <label for="inicio">Data/Hora Início</label>

                                <input type="text" class="date form-control" autocomplete="off" value="{{date('dd/mm/Y')}}" name="data_hora_inicio" id="data_hora_inicio">
                            

                            </div>
                            <div class="col-md-2">
                                <label for="nm_rs" id="l_nm_rs">Documento</label>
                                <input type="text" class="form-control" placeholder="Razão Social" name="nome" id="nm_rs"
                                       @if($mov->id <> '')
                                       value="{{$mov->nome}}"
                                       @else
                                       value="Efficax Soluções"
                                       @endif/>
                            </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="pessoa">Cliente</label>
                            <select class="select2pessoa form-control" name="pessoa_id" id="pessoa">
                            </select>
                        </div>    


                            
                              
                                <label for="nm_rs" id="l_nm_rs">Histórico</label>
                                <input type="text" class="form-control" placeholder="Razão Social" name="nome" id="nm_rs"
                                   @if($mov->id <> '')
                                   value="{{$mov->nome}}"
                                   @else
                                   value=""
                                   @endif/>
                               
                                
                               
                                <label for="nm_rs" id="l_nm_rs">Valor</label>
                                <input type="text" class="form-control" placeholder="Razão Social" name="nome" id="nm_rs"
                                   @if($mov->id <> '')
                                   value="{{$mov->nome}}"
                                   @else
                                   value=""
                                   @endif/>
                               
                                
                            
                            
                            


                        <div class="form-group">
                            <label for="ativo">Inativo:</label>
                            <input id="ativo" type="checkbox" name="ativo" value="0" class="form-check-input"
                                   @if($mov->id <> '' && $mov->ativo == 0)
                                   checked
                                   @endif/>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-close"></i> Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
</form>
@stop