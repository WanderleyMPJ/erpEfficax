@extends('layouts._menu')
@section('menutop')
<div id="content-header">
    <div id="breadcrumb"> <a href="{{ route('home') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('pessoa') }}" class="current">Pessoa</a> </div>


</div>
@endsection

@section('content')

<div class="widget-box">
    <div class="widget-title"> <span class="icon"><input type="checkbox" id="title-checkbox" name="title-checkbox"></span>
        <h5>Listagem Pessoas</h5>
    </div>
    <div class="widget-content nopadding">
    <table class="table table-bordered data-table table-striped with-check">
        <thead>
            <tr>
                <th><i class="icon-resize-vertical"></i></th>
                <th>Nome</th>
                <th>CNPJ ou CPF</th>
                <th>RG ou Insc Estadual</th>
                <th>Ativo</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pessoas as $pessoa)
            
            <tr>
                <td><input id="check" type="checkbox" /></td>
                <td>{{$pessoa->nome}}</td>
                <td>{{$pessoa->cnpj_cpf}}</td>
                <td>{{$pessoa->rg_inscest}}</td>
                @if($pessoa->ativo == 1)
                <td><input type="checkbox"  checked="checked" disabled/></td>
                @elseif($pessoa->ativo == 0)
                <td><input type="checkbox" disabled/></td>
                @endif
            </tr>
            @empty
            <p>Nenhuma Pessoa Encontrada...</p>
            @endforelse
            </tbody>
    </table>
</div>
</div>
{{--<script src="js/jquery.min.js"></script>
<script src="js/jquery.ui.custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.uniform.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/matrix.js"></script>
<script src="js/matrix.tables.js"></script>--}}
@endsection
@extends('layouts._rodape')