@extends('adminlte::page')

@section('content_header')
    <section class="content-header">
        <h1 class="text-red">
            <i class="fa fa-user"></i>Cadastro de Empresas
            {{--<small>it all starts here</small>--}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Empresa</a></li>
            <li class="active">Cadastro</li>
        </ol>
    </section>
@stop

@section('content')
    <div class="box">

        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-list"></i>Cadastro</h3>
            <br><br>

        </div>

        <div class="box-body">
            <div class="widget-content nopadding">


            </div>
        </div>
    </div>

@stop