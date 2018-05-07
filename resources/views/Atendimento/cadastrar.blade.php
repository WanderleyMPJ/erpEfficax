@extends('adminlte::page')

@section('content_header')
<section class="content-header">
    <h1 class="text-bold text-green">
        <i class="fa fa-life-ring"></i> Atendimento
        {{--<small>it all starts here</small>--}}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('atendimento.dashboard')}}">Atendimentos</a></li>
        <li class="active">Lançamento</li>
    </ol>
</section>
@stop
@section('content')
    <form rol="form" method="get" id="myForm">
        <div class="hide">
            <input type="checkbox" value="0"  id="status" name="atendimentostatus_id" checked>
            <input type="checkbox" value="0"  id="tp_transf" name="tp_transf" checked>
            {{date_default_timezone_set('America/Porto_Velho')}}
            <input type="text" class="date form-control" autocomplete="off" value="{{date('d/m/Y HH:i:s')}}" name="data_acao" id="data_acao">
        </div>
        <div class="invisible">
            <input type="checkbox" value="{{ Auth::user()->id}}"  id="atendente_id" name="atendente_id" checked>
        </div>
        <div class="box box-default">
            <div class="widget-content nopadding">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <i class="fa fa-plus"></i> {{$titulo}}
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inicio">Data/Hora Início</label>
                            <div class="row">
                           <div class="col-xs-3">
                               <input type="text" class="date form-control" autocomplete="off" value="{{date('d/m/Y HH:i:s')}}" name="data_hora_inicio" id="data_hora_inicio"></div>
                        </div>
                        <div class="form-group">
                            <label for="pessoa">Cliente</label>
                            <select class="select2pessoa form-control" name="pessoa_id" id="pessoa">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="solicitante">Solicitante</label>
                            <input type="text" class="form-control" name="solicitante" id="solicitante">
                        </div>
                        <div class="form-group">
                            <label for="solicitante">Origem</label>
                            <select class="select2 form-control" name="atendimentoorigem_id" id="atendimentoorigem_id">
                                @foreach($origens as $origem)
                                    <option value="{{$origem->id}}">{{$origem->descricao}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                        <hr>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="solicitacao">Solicitação</label>
                            <input type="text" class="form-control" name="solicitacao" id="solicitacao">
                        </div>
                        <div class="form-group">
                            <label for="solicitacao">Ação</label>
                            <textarea rows="5" class="form-control" id="solucao" name="acao"></textarea>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a onclick="sendform('4')" class="btn btn-success"><i class="fa fa-check-square"></i> Concluído</a>
                        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#agendamento"><i class="fa fa-calendar-plus-o"></i> Agendar</a>
                        <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#transferencia"><i class="fa fa-exchange"></i> Transferir</a>
                      @if($atendimento->id <> '')
                            <button type="reset" class="btn btn-danger" data-toggle="modal" data-target="#historico"><i class="fa fa-clock-o"></i> Histórico</button>
                      @endif
                    </div>
                    <div class="box-footer"></div>
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <i class="fa fa-sticky-note"></i> Solicitações
                        </h3>
                        <div class="box-tools pull-right">
                            <a onclick="novasolicitacao()" class="btn bg-olive"><i class="fa fa-plus"></i> Nova Solicitação</a>
                        </div>
                    </div>
                    <br>
                    <div class="box-body">
                        <div class="form-group">
                            <table class="table table-striped table-bordered datatables" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Data</th>
                                        <th>Solicitação</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <div class="modal fade" tabindex="-1" role="dialog" id="agendamento">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Agendamento</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="data">Data</label>
                        <input type="text" class="date form-control" autocomplete="off" value="{{date('d/m/Y HH:i:s')}}" name="data_agendamento">
                    </div>
                    <div class="form-group">
                        <label for="acao">Motivo</label>
                        <input type="text" class="form-control" id="acao">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-cancel"></i> Cancelar</button>
                    <a onclick="status('2')" type="button" class="btn btn-primary"><i class="fa fa-calendar-plus-o"></i> Agendar</a>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="transferencia">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Transferência</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="data">Destino: </label>
                        <div data-toggle="buttons-radio" class="btn-group">
                            <button  onclick="destino('2')" class="btn btn-primary active" type="button">
                                <i class="fa fa-users"></i> Departamento
                            </button>
                            <button  onclick="destino('1')" class="btn btn-primary" type="button">
                                <i class="fa fa-user"></i> Usuário
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label id="textodest" for="acao">Selecione o DEPARTAMENTO</label>
                        <input type="text" class="form-control" id="dep">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-cancel"></i> Cancelar</button>
                    <a onclick="status('3')" type="button" class="btn btn-primary"><i class="fa fa-exchange"></i> Transferir</a>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
            <div class="modal fade" tabindex="-1" role="dialog" id="concluido">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Finalizar</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="data">Data e Hora Conclusão: </label>
                        <input type="text" class="date form-control" autocomplete="off" value="{{date('d/m/Y HH:i:s')}}" name="data_fim" id="data_fim">
                    </div>
                    <div class="form-group">
                        <label id="textodest" for="acao">Solução</label>
                        <input type="text" class="form-control" name="solucao" id="Solução">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-cancel"></i> Cancelar</button>
                    <a onclick="status('4')" type="button" class="btn btn-primary"><i class="fa fa-exchange"></i> Concluir</a>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="historico">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Histórico</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <table class="table table-striped table-bordered datatables" style="width:100%">
                            <thead>
                            <tr>
                                <th>Data</th>
                                <th>Solução</th>
                                <th>Ação</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-cancel"></i> Voltar</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop