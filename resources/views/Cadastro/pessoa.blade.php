@extends('adminlte::page')

@section('content_header')
    <section class="content-header">
        <h1 class="text-red">
            <i class="fa fa-user"></i> Pessoas
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('pessoa.index')}}">Pessoas</a></li>
            <li class="active">Cadastro</li>
        </ol>
    </section>
@stop
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">
            <i class="fa fa-plus"></i> Cadastro
        </h3>
    </div>
    <form role="form"
          @if($tipo=='0')
          action="{{route('pessoa.atualizar', $pessoa->id)}}"
          @else
          action="{{ route('pessoa.salvar') }}"
          @endif
          method="get">
        <div class="box-body">
            <div class="widget-content nopadding">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Dados Básicos
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="checkboxes">
                                Tipo de Pessoa:
                            </label>
                            <div data-toggle="buttons-radio" class="btn-group">
                                <button
                                    @if($tipo=='0' && $pessoa->tipo_pessoa == 'fisica')
                                        class="btn btn-primary active"
                                    @else
                                        class="btn btn-primary"
                                    @endif
                                        onclick="pessoa(0)" type="button">
                                        <i class="icon-user"></i> Física
                                </button>
                                <button
                                    @if($tipo=='0' && $pessoa->tipo_pessoa == 'juridica')
                                        class="btn btn-primary active"
                                    @else
                                    @if($tipo=='1')
                                        class="btn btn-primary active"
                                    @else
                                        class="btn btn-primary"
                                    @endif
                                    @endif
                                        onclick="pessoa(1)" type="button"><i class="icon-legal"></i> Jurídica
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nm_rs">Nome | Razão Social</label>
                            <input type="text" class="form-control" placeholder="Razão Social" name="nome" id="nm_rs"
                               @if($tipo=='0')
                                    value="{{$pessoa->nome}}"
                               @else
                                    value="Efficax Soluções"
                               @endif/>
                        </div>
                        <div class="form-group">
                            <label for="ap_nf">Apelido | Nome Fantasia</label>
                            <input type="text" class="form-control" placeholder="Nome Fantasia" name="fantasia" id="ap_nf"
                                @if($tipo=='0')
                                    value="{{$pessoa->fantasia}}"
                               @else
                                    value="Efficax"
                               @endif/>
                        </div>
                        <div class="form-group">
                            <label for="cp_cn">CPF | CNPJ</label>
                            <input type="text"  class="form-control" placeholder="CNPJ"  name="cnpj_cpf" id="cp_cn"
                                @if($tipo=='0')
                                    value="{{$pessoa->cnpj_cpf}}"
                                @endif />
                        </div>
                        <div class="form-group">
                            <label for="rg_inscest">RG | Inscrição Estadual</label>
                            <input type="text" class="form-control" placeholder="Inscrição Estadual" name="rg_inscest" id="rg_inscest"
                                @if($tipo=='0')
                                    value="{{$pessoa->rg_inscest}}"
                                @else
                                    value="000"
                                @endif/>
                        </div>
                        <div class="form-group">
                            <label>Grupo</label>
                            <select class="select2multiple form-control" name="grupo[]" multiple="multiple">
                                @forelse($grupo as $grupo)
                                    <option
                                        @if($tipo=='0')
                                            @foreach($pessoa->grupos as $pgrupos)
                                                @if($pgrupos->pessoagrupo_id == $grupo->id)
                                                    selected
                                                @else
                                                @endif
                                            @endforeach
                                        @else
                                        @endif
                                            value="{{$grupo->id}}">
                                        {{$grupo->Descricao}}
                                    </option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ativo">Inativo:</label>
                            <input id="ativo" type="checkbox" name="ativo" value="0" class="form-check-input"
                                @if($tipo==0 && $pessoa->ativo == 0)
                                    checked
                                @endif/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Contatos</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" type="button" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">{{--Form Endereços--}}
                        <div class="form-group">
                            <label for="c_desc">Descrição</label>
                            <input type="text" class="form-control" placeholder="Descrição" name="c_descricao" id="c_desc"
                                @if($tipo=='0' && $pessoa->contatos <> '[]')
                                    value="{{$pessoa->contatos[0]->descricao}}"
                                @elseif($tipo=='0' && $pessoa->contatos = '[]')
                                    value=""
                                @else value="Pessoal"
                                @endif/>
                        </div>
                        <div class="form-group">
                            <label for="c_mail">E-mail</label>
                            <input type="text"  class="form-control" placeholder="E-mail"  name="c_email" id="c_mail"
                                @if($tipo=='0' && $pessoa->contatos <> '[]')
                                    value="{{$pessoa->contatos[0]->email}}"
                                @elseif($tipo=='0' && $pessoa->contatos = '[]')
                                    value=""
                                @else
                                    value="efficax.pedrogmail.com"
                                @endif/>
                        </div>
                        <div class="form-group">
                            <label for="c_telefone">Telefone</label>
                            <input type="text" class="form-control" placeholder="Telefone" name="c_telefone" id="telefone"
                                @if($tipo=='0' && $pessoa->contatos <> '[]')
                                    value="{{$pessoa->contatos[0]->telefone}}"
                                @elseif($tipo=='0' && $pessoa->contatos = '[]')
                                    value=""
                                @else
                                @endif/>
                        </div>
                    </div>{{--End Form--}}
                    <div class="col-md-6"><!-- /Lista de Endereços -->
                        <p>Entra Listas</p>
                    </div><!-- End Lista -->
                </div>
                <div class="box-footer">
                    <p>Entra Botões</p>
                </div>
            </div>
        </div>
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Endereços</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" type="button" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">{{--Form Endereços--}}
                        <div class="form-group">
                            <label for="e_desc">Descrição</label>
                            <input type="text" class="form-control" placeholder="Descrição" name="e_descricao" id="e_desc"
                                @if($tipo=='0' && $pessoa->enderecos <> '[]')
                                    value="{{$pessoa->enderecos[0]->descricao}}"
                                @elseif($tipo=='0' && $pessoa->enderecos = '[]')
                                    value=""
                                @else
                                    value="Casa"
                                @endif/>
                        </div>
                        <div class="form-group">
                            <label for="e_cep">CEP</label>
                            <input type="text" class="form-control" placeholder="CEP" name="e_cep" id="e_cep"
                                @if($tipo=='0' && $pessoa->enderecos <> '[]')
                                    value="{{$pessoa->enderecos[0]->cep}}"
                                @elseif($tipo=='0' && $pessoa->enderecos = '[]')
                                    value=""
                                @else
                                    value="76808209"
                                @endif/>
                        </div>
                        <div class="form-group">
                            <label for="e_estado">Estado</label>
                            <input type="text"  class="form-control" placeholder="Estado"  name="e_uf" id="e_estado"
                                @if($tipo=='0' && $pessoa->enderecos <> '[]')
                                    value="{{$pessoa->enderecos[0]->uf}}"
                                @elseif($tipo=='0' && $pessoa->enderecos = '[]')
                                    value=""
                                @else
                                    value="RO"
                                @endif/>
                        </div>
                        <div class="form-group">
                            <label for="e_cidade">Cidade</label>
                            <input type="text"  class="form-control" placeholder="Cidade"  name="e_cidade" id="e_cidade"
                                @if($tipo=='0' && $pessoa->enderecos <> '[]')
                                    value="{{$pessoa->enderecos[0]->cidade}}"
                                @elseif($tipo=='0' && $pessoa->enderecos = '[]')
                                    value=""
                                @else
                                    value="Porto Velho"
                                @endif/>
                        </div>
                        <div class="form-group">
                            <label for="e_bairro">Bairro</label>
                            <input type="text"  class="form-control" placeholder="Bairro"  name="e_bairro" id="e_bairro"
                                @if($tipo=='0' && $pessoa->enderecos <> '[]')
                                    value="{{$pessoa->enderecos[0]->bairro}}"
                                @elseif($tipo=='0' && $pessoa->enderecos = '[]')
                                    value=""
                                @else
                                    value="Conceição"
                                @endif/>
                        </div>
                        <div class="form-group">
                            <label for="e_logr">Loradouro</label>
                            <input type="text" class="form-control" placeholder="Rua, Número" name="e_logradouro" id="e_logr"
                                @if($tipo=='0' && $pessoa->enderecos <> '[]')
                                    value="{{$pessoa->enderecos[0]->logradouro}}"
                                @elseif($tipo=='0' && $pessoa->enderecos = '[]')
                                    value=""
                                @else
                                    value="Magnólia, 3784"
                                @endif/>
                        </div>
                        <div class="form-group">
                            <label for="e_comp">Complemento</label>
                            <input type="text" class="form-control" placeholder="Complemento" name="e_complemento" id="e_comp"
                                @if($tipo=='0' && $pessoa->enderecos <> '[]')
                                    value="{{$pessoa->enderecos[0]->complemento}}"
                                @elseif($tipo=='0' && $pessoa->enderecos = '[]')
                                    value=""
                                @else
                                    value="Casa"
                                @endif/>
                        </div>
                        <div class="form-group">
                            <label for="e_ref">Referência</label>
                            <input type="text" class="form-control" placeholder="Referência" name="e_referencia" id="e_ref"
                                @if($tipo=='0' && $pessoa->enderecos <> '[]')
                                    value="{{$pessoa->enderecos[0]->referencia}}"
                                @elseif($tipo=='0' && $pessoa->enderecos = '[]')
                                    value=""
                                @else
                                    value="Perto Do Shopping"
                                @endif/>
                        </div>
                    </div>{{--End Form--}}
                    <div class="col-md-6"><!-- /Lista de Endereços -->
                        <p>Entra Listas</p>
                    </div><!-- End Lista -->
                </div>
                <div class="box-footer">
                    <p>Entra Botões</p>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Endereços</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" type="button" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">{{--Form Endereços--}}
                <div class="form-group">
                    <label for="e_desc">Descrição</label>
                    <input type="text" class="form-control" placeholder="Descrição" name="e_descricao" id="e_desc"
                           @if($tipo=='0' && $pessoa->enderecos <> '[]')
                           value="{{$pessoa->enderecos[0]->descricao}}"
                           @elseif($tipo=='0' && $pessoa->enderecos = '[]')
                           value=""
                           @else
                           value="Casa"
                            @endif/>
                </div>
                <div class="form-group">
                    <label for="e_cep">CEP</label>
                    <input type="text" class="form-control" placeholder="CEP" name="e_cep" id="e_cep"
                           @if($tipo=='0' && $pessoa->enderecos <> '[]')
                           value="{{$pessoa->enderecos[0]->cep}}"
                           @elseif($tipo=='0' && $pessoa->enderecos = '[]')
                           value=""
                           @else
                           value="76808209"
                            @endif/>
                </div>
                <div class="form-group">
                    <label for="e_estado">Estado</label>
                    <input type="text"  class="form-control" placeholder="Estado"  name="e_uf" id="e_estado"
                           @if($tipo=='0' && $pessoa->enderecos <> '[]')
                           value="{{$pessoa->enderecos[0]->uf}}"
                           @elseif($tipo=='0' && $pessoa->enderecos = '[]')
                           value=""
                           @else
                           value="RO"
                            @endif/>
                </div>
                <div class="form-group">
                    <label for="e_cidade">Cidade</label>
                    <input type="text"  class="form-control" placeholder="Cidade"  name="e_cidade" id="e_cidade"
                           @if($tipo=='0' && $pessoa->enderecos <> '[]')
                           value="{{$pessoa->enderecos[0]->cidade}}"
                           @elseif($tipo=='0' && $pessoa->enderecos = '[]')
                           value=""
                           @else
                           value="Porto Velho"
                            @endif/>
                </div>
                <div class="form-group">
                    <label for="e_bairro">Bairro</label>
                    <input type="text"  class="form-control" placeholder="Bairro"  name="e_bairro" id="e_bairro"
                           @if($tipo=='0' && $pessoa->enderecos <> '[]')
                           value="{{$pessoa->enderecos[0]->bairro}}"
                           @elseif($tipo=='0' && $pessoa->enderecos = '[]')
                           value=""
                           @else
                           value="Conceição"
                            @endif/>
                </div>
                <div class="form-group">
                    <label for="e_logr">Loradouro</label>
                    <input type="text" class="form-control" placeholder="Rua, Número" name="e_logradouro" id="e_logr"
                           @if($tipo=='0' && $pessoa->enderecos <> '[]')
                           value="{{$pessoa->enderecos[0]->logradouro}}"
                           @elseif($tipo=='0' && $pessoa->enderecos = '[]')
                           value=""
                           @else
                           value="Magnólia, 3784"
                            @endif/>
                </div>
                <div class="form-group">
                    <label for="e_comp">Complemento</label>
                    <input type="text" class="form-control" placeholder="Complemento" name="e_complemento" id="e_comp"
                           @if($tipo=='0' && $pessoa->enderecos <> '[]')
                           value="{{$pessoa->enderecos[0]->complemento}}"
                           @elseif($tipo=='0' && $pessoa->enderecos = '[]')
                           value=""
                           @else
                           value="Casa"
                            @endif/>
                </div>
                <div class="form-group">
                    <label for="e_ref">Referência</label>
                    <input type="text" class="form-control" placeholder="Referência" name="e_referencia" id="e_ref"
                           @if($tipo=='0' && $pessoa->enderecos <> '[]')
                           value="{{$pessoa->enderecos[0]->referencia}}"
                           @elseif($tipo=='0' && $pessoa->enderecos = '[]')
                           value=""
                           @else
                           value="Perto Do Shopping"
                            @endif/>
                </div>
            </div>{{--End Form--}}
            <div class="col-md-6"><!-- /Lista de Endereços -->
                <p>Entra Listas</p>
            </div><!-- End Lista -->
        </div>
        <div class="box-footer">
            <p>Entra Botões</p>
        </div>
    </div>
</div>
@stop