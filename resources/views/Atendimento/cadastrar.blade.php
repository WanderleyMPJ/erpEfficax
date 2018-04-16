@extends('adminlte::page')

@section('content_header')
<section class="content-header">
    <h1 class="text-red">
        <i class="fa fa-building"></i> Atendimento
        {{--<small>it all starts here</small>--}}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{route('atendimento.dashboard')}}">Dashboard</a></li>
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
                  action="{{route('empresa.atualizar', $atendimento->id)}}"
                  @else
                  action="{{route('empresa.salvar')}}"
                  @endif>
                  <div class="box-body">

                    <div class="form-group">
                        <label>Data Inicio:</label>

                        <div class="input-group date">

                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" name="data_inicio" id="datepicker">
                        </div>
                        <!-- /.input group -->
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="status">Origem:</label>
                        <div class="col-sm-10">
                            <select class="form-control select2simples" name="atendimentoorigem_id" id="atendimentoorigem">
                                @forelse($atendimentoorigens as $origem)
                                <option
                                    @if($tipo=='0' && $origem->id == $atendimento->atendimentoorigem_id)
                                    selected
                                    @endif
                                    value="{{$origem->id}}">{{$origem->descricao}}</option>
                                @empty
                                <p>Primeiro cadastre uma Origem</p>
                                @endforelse
                            </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="status">Status:</label>
                        <div class="col-sm-10">
                            <select class="form-control select2simples" name="pessoa_id" id="pessoa">
                                @forelse($atendimentostatuss as $status)
                                <option
                                    @if($tipo=='0' && $status->id == $atendimento->pessoa_id)
                                    selected
                                    @endif
                                    value="{{$status->id}}">{{$status->descricao}}</option>
                                @empty
                                <p>Primeiro cadastre um status</p>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="pessoa">Pessoa:</label>
                        <div class="col-sm-10">
                            <select class="form-control select2simples" name="pessoa_id" id="pessoa">
                                @forelse($pessoas as $pessoa)
                                <option
                                    @if($tipo=='0' && $pessoa->id == $atendimento->pessoa_id)
                                    selected
                                    @endif
                                    value="{{$pessoa->id}}">{{$pessoa->nome}}</option>
                                @empty
                                <p>Primeiro cadastre uma pessoa</p>
                                @endforelse
                            </select>
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


<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../../bower_components/moment/min/moment.min.js"></script>
<script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- bootstrap datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Page script -->
<script>
                    $(function () {
                        //Initialize Select2 Elements
                        $('.select2').select2()

                        //Datemask dd/mm/yyyy
                        $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
                        //Datemask2 mm/dd/yyyy
                        $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
                        //Money Euro
                        $('[data-mask]').inputmask()

                        //Date range picker
                        $('#reservation').daterangepicker()
                        //Date range picker with time picker
                        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'})
                        //Date range as a button
                        $('#daterange-btn').daterangepicker(
                                {
                                    ranges: {
                                        'Today': [moment(), moment()],
                                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                                    },
                                    startDate: moment().subtract(29, 'days'),
                                    endDate: moment()
                                },
                                function (start, end) {
                                    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                                }
                        )

                        //Date picker
                        $('#datepicker').datepicker({
                            autoclose: true
                        })

                        //iCheck for checkbox and radio inputs
                        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                            checkboxClass: 'icheckbox_minimal-blue',
                            radioClass: 'iradio_minimal-blue'
                        })
                        //Red color scheme for iCheck
                        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                            checkboxClass: 'icheckbox_minimal-red',
                            radioClass: 'iradio_minimal-red'
                        })
                        //Flat red color scheme for iCheck
                        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                            checkboxClass: 'icheckbox_flat-green',
                            radioClass: 'iradio_flat-green'
                        })

                        //Colorpicker
                        $('.my-colorpicker1').colorpicker()
                        //color picker with addon
                        $('.my-colorpicker2').colorpicker()

                        //Timepicker
                        $('.timepicker').timepicker({
                            showInputs: false
                        })
                    })
</script>


@stop