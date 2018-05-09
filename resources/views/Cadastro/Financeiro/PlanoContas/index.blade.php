@extends('adminlte::page')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link href="/css/treeview.css" rel="stylesheet">

@section('content_header')
    <section class="content-header">
        <h1 class="text-red">
            <i class="fa "></i> Plano de Contas
            {{--<small>it all starts here</small>--}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Plano de Contas</li>
        </ol>
    </section>
@stop


@section('content')

<div class="box">
    <div class="box box-header">
        <div class="panel-heading">Manage Category TreeView</div>
     </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <h3>Plano de Contas</h3>
                    <ul id="tree1">
                        @foreach($planocontas as $category)
                            <li>
                                {{ $category->codconta.' - '.$category->descricao }}
                                @if(count($category->childs))
                                    @include('cadastro.financeiro.planocontas.manageChild',['childs' => $category->childs])
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-6">
                    <h3>Add New Category</h3>


                    {!! Form::open(['route'=>'planocontas.salvar']) !!}


                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif


                    <div class="form-group {{ $errors->has('codconta') ? 'has-error' : '' }}">
                        {!! Form::label('Código:') !!}
                        {!! Form::text('codconta', old('codconta'), ['class'=>'form-control', 'placeholder'=>'Código']) !!}
                        <span class="text-danger">{{ $errors->first('codconta') }}</span>
                    </div>

                   <div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
                        {!! Form::label('Descricao:') !!}
                        {!! Form::text('descricao', old('descricao'), ['class'=>'form-control', 'placeholder'=>'Descricao']) !!}
                        <span class="text-danger">{{ $errors->first('descricao') }}</span>
                    </div>


                    <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
                        {!! Form::label('Plano Pai:') !!}
                        {!! Form::select('parent_id', $allplanocontas, old('parent_id'),
                            ['class'=>'form-control', 'placeholder'=>'Selecione o Plano de Contas Pai']) !!}
                        <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                    </div>


                    <div class="form-group">
                        <button class="btn btn-success">Salvar</button>
                    </div>


                    {!! Form::close() !!}


                </div>
            </div>


        </div>
    </div>
</div>
<script src="/js/treeview.js"></script>

@stop