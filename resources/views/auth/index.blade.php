@extends('layouts._menu')
@section('menutop')
<div id="content-header">
    <div id="breadcrumb"> <a href="{{ route('home') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('user') }}" class="current">Usuários</a> </div>
</div>
@endsection
@section('content')
<div class="widget-box">
    <div class="widget-title"> <span class="icon"><input type="checkbox" id="title-checkbox" name="title-checkbox"></span>
        <h5>Listagem de Usuários</h5>
    </div>
    <div class="widget-content nopadding">
        <table class="table table-bordered data-table with-check">
            <thead>
                <tr>
                    <th><i class="icon-resize-vertical"></i></th>
                    <th>Nome</th>
                    <th>e-mail</th>
                    <th>Perfil</th>
                    <th>Ativo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)

                <tr>
                    
                    <td><input type="checkbox" /></td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->Perfils}}</td>
                    @if($user->ativo == 1)
                    <td><input type="checkbox"  checked="checked" disabled/></td>
                    @elseif($user->ativo == 0)
                    <td><input type="checkbox" disabled/></td>
                    @endif
                    <td><input type="button" class="btn-secondary" placeholder="Editar"> <button class="btn-info">Editar</button></td>
                </tr>
                @empty
            <p>Nenhum Usuário Encontrado...</p>
            @endforelse

            </tbody>
        </table>
    </div>
</div>

@endsection
