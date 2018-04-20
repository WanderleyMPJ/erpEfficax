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
    <form rol="form"
          @if($pessoa->id <> '')
          action="{{route('pessoa.atualizar', $pessoa->id)}}"
          @else
          action="{{ route('pessoa.salvar') }}"
          @endif
          method="get">
        <div class="invisible">
            <input type="checkbox" value="juridica"  id="tp_pessoa" name="tipo_pessoa" checked>
        </div>
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">
                    <i class="fa fa-plus"></i> Cadastro
                </h3>
            </div>
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
                                Tipo de Pessoa:
                            </label>
                            <div data-toggle="buttons-radio" class="btn-group">
                                <button
                                    @if($pessoa->id <> '' && $pessoa->tipo_pessoa == 'fisica')
                                        class="btn btn-primary active"
                                    @else
                                        class="btn btn-primary"
                                    @endif
                                        onclick="pessoa('0')" type="button">
                                        <i class="fa fa-user"></i> Física
                                </button>
                                <button
                                    @if($pessoa->id <> '' && $pessoa->tipo_pessoa == 'juridica')
                                        class="btn btn-primary active"
                                    @else
                                    @if($pessoa->id == '')
                                        class="btn btn-primary active"
                                    @else
                                        class="btn btn-primary"
                                    @endif
                                    @endif
                                        onclick="pessoa('1')" type="button"><i class="fa fa-legal"></i> Jurídica
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nm_rs" id="l_nm_rs">Razão Social</label>
                            <input type="text" class="form-control" placeholder="Razão Social" name="nome" id="nm_rs"
                               @if($pessoa->id <> '')
                                    value="{{$pessoa->nome}}"
                               @else
                                    value="Efficax Soluções"
                               @endif/>
                        </div>
                        <div class="form-group">
                            <label for="ap_nf" id="l_ap_nf">Nome Fantasia</label>
                            <input type="text" class="form-control" placeholder="Nome Fantasia" name="fantasia" id="ap_nf"
                                @if($pessoa->id <> '')
                                    value="{{$pessoa->fantasia}}"
                               @else
                                    value="Efficax"
                               @endif/>
                        </div>
                        <div class="form-group">
                            <label for="cp_cn" id="l_cp_cn">CNPJ</label>
                            <input type="text"  class="form-control" placeholder="CNPJ"  name="cnpj_cpf" id="cp_cn"
                                @if($pessoa->id <> '')
                                    value="{{$pessoa->cnpj_cpf}}"
                                @endif />
                        </div>
                        <div class="form-group">
                            <label for="rg_inscest" id="l_rg_inscest">Inscrição Estadual</label>
                            <input type="text" class="form-control" placeholder="Inscrição Estadual" name="rg_inscest" id="rg_inscest"
                                @if($pessoa->id <> '')
                                    value="{{$pessoa->rg_inscest}}"
                                @else
                                    value="000"
                                @endif/>
                        </div>
                        <div class="form-group">
                            <label>Grupo</label>
                            <select class="form-control select2multiple" name="grupo[]" multiple>
                                @forelse($grupo as $grupo)
                                    <option @if($pessoa->id <> '')
                                            @foreach($pessoa->grupos as $pgrupos)
                                            @if($pgrupos->pessoagrupo_id == $grupo->id)
                                            selected
                                            @else

                                            @endif
                                            @endforeach
                                            @else

                                            @endif
                                            value="{{$grupo->id}}">{{$grupo->Descricao}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ativo">Inativo:</label>
                            <input id="ativo" type="checkbox" name="ativo" value="0" class="form-check-input"
                                @if($pessoa->id <> '' && $pessoa->ativo == 0)
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
    <div class="box box-default @if($pessoa->id == '') collapsed-box" @else @endif>
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-plus"></i> Dados Adicionais</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" type="button" data-widget="collapse"><i class="fa @if($pessoa->id == '') fa-plus @else  fa-minus @endif"></i></button>
                    </div>
            </div>
            <form role="form"
                @if($pessoa->id <> '')
                    @if($contato <> '')
                        action="{{route('pessoa.contato.atualizar', $contato->id)}}"
                    @else
                        action="{{route('pessoa.contato.salvar', $pessoa->id)}}"
                    @endif
                @endif
                  id="contato" method="get">
            <div class="widget-content nopadding">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-phone"></i> Contatos</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">{{--Form Endereços--}}
                                <div class="form-group">
                                    <label for="c_desc">Descrição</label>
                                    <input type="text" class="form-control" placeholder="Descrição" name="c_descricao" id="c_desc"
                                            @if($pessoa->id <> '' && $contato <> '')
                                            value="{{$contato->descricao}}"
                                            @elseif($pessoa->id <> '' && $contato = '')
                                            value=""
                                            @else
                                            @endif/>
                                </div>
                                <div class="form-group">
                                    <label for="c_mail">E-mail</label>
                                    <input type="text"  class="form-control" placeholder="E-mail"  name="c_email" id="c_mail"
                                            @if($pessoa->id <> '' && $contato <> '')
                                            value="{{$contato->email}}"
                                            @elseif($pessoa->id <> '' && $contato = '')
                                            value=""
                                            @else
                                            @endif/>
                                </div>
                                <div class="form-group">
                                    <label for="c_telefone">Telefone</label>
                                    <input type="text" class="form-control" placeholder="Telefone" name="c_telefone" id="telefone"
                                            @if($pessoa->id <> '' && $contato <> '')
                                            value="{{$contato->telefone}}"
                                            @elseif($pessoa->id <> '' && $contato = '')
                                            value=""
                                            @else
                                            @endif/>
                                </div>
                            </div>{{--End Form--}}
                            <div class="col-md-6"><!-- /Lista de Endereços -->
                                <table class="table table-striped table-bordered datatables" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Descrição</th>
                                        <th>Telefone</th>
                                        <th>Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($pessoa->contatos <> '[]')
                                    @forelse($pessoa->contatos as $contato)
                                        <tr>
                                            <td >{{$contato->descricao}}</td>
                                            <td>{{$contato->telefone}}</td>
                                            <td><a class="btn btn-info" href="{{route('pessoa.contato.editar', $contato->id)}}"><i class="fa fa-edit"></i>Editar</a> <a class="btn btn-danger" href="{{route('pessoa.contato.excluir', $contato->id)}}"><i class="fa fa-trash"></i>Excluir</a></td>
                                        </tr>
                                    @empty
                                    @endforelse
                                        @endif

                                    </tbody>
                                </table>
                            </div><!-- End Lista -->
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>
                            <a href="{{route('pessoa.detalhe', $pessoa->id)}}" class="btn btn-info"><i class="fa fa-plus"></i> Novo Contato</a>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <form role="form"
                @if($pessoa->id <> '')
                    @if($endereco <> '')
                        action="{{route('pessoa.endereco.atualizar', $endereco->id)}}"
                    @else
                        action="{{route('pessoa.endereco.salvar', $pessoa->id)}}"
                    @endif
                @endif   method="get">
                <div class="widget-content nopadding">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-road"></i> Endereços</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">{{--Form Endereços--}}
                                    <div class="form-group">
                                        <label for="e_desc">Descrição</label>
                                        <input type="text" class="form-control" placeholder="Descrição" name="e_descricao" id="e_desc"
                                               @if($pessoa->id <> '' && $endereco <> '')
                                               value="{{$endereco->descricao}}"
                                               @elseif($pessoa->id <> '' && $endereco = '')
                                               value=""
                                        @else
                                                @endif/>
                                    </div>
                                    <div class="form-group">
                                        <label for="e_cep">CEP</label>
                                        <input type="text" class="form-control" placeholder="CEP" name="e_cep" id="e_cep"
                                               @if($pessoa->id <> '' && $endereco <> '')
                                               value="{{$endereco->cep}}"
                                               @elseif($pessoa->id <> '' && $endereco = '')
                                               value=""
                                        @else
                                                @endif/>
                                    </div>
                                    <div class="form-group">
                                        <label for="e_estado">Estado</label>
                                        <input type="text"  class="form-control" placeholder="Estado"  name="e_uf" id="e_estado"
                                               @if($pessoa->id <> '' && $endereco <> '')
                                               value="{{$endereco->uf}}"
                                               @elseif($pessoa->id <> '' && $endereco = '')
                                               value=""
                                        @else
                                                @endif/>
                                    </div>
                                    <div class="form-group">
                                        <label for="e_cidade">Cidade</label>
                                        <input type="text"  class="form-control" placeholder="Cidade"  name="e_cidade" id="e_cidade"
                                               @if($pessoa->id <> '' && $endereco <> '')
                                               value="{{$endereco->cidade}}"
                                               @elseif($pessoa->id <> '' && $endereco = '')
                                               value=""
                                        @else
                                                @endif/>
                                    </div>
                                    <div class="form-group">
                                        <label for="e_bairro">Bairro</label>
                                        <input type="text"  class="form-control" placeholder="Bairro"  name="e_bairro" id="e_bairro"
                                               @if($pessoa->id <> '' && $endereco <> '')
                                               value="{{$endereco->bairro}}"
                                               @elseif($pessoa->id <> '' && $endereco = '')
                                               value=""
                                        @else
                                                @endif/>
                                    </div>
                                    <div class="form-group">
                                        <label for="e_logr">Loradouro</label>
                                        <input type="text" class="form-control" placeholder="Rua, Número" name="e_logradouro" id="e_logr"
                                               @if($pessoa->id <> '' && $endereco <> '')
                                               value="{{$endereco->logradouro}}"
                                               @elseif($pessoa->id <> '' && $endereco = '')
                                               value=""
                                        @else
                                                @endif/>
                                    </div>
                                    <div class="form-group">
                                        <label for="e_comp">Complemento</label>
                                        <input type="text" class="form-control" placeholder="Complemento" name="e_complemento" id="e_comp"
                                               @if($pessoa->id <> '' && $endereco <> '')
                                               value="{{$endereco->complemento}}"
                                               @elseif($pessoa->id <> '' && $endereco = '')
                                               value=""
                                        @else
                                                @endif/>
                                    </div>
                                    <div class="form-group">
                                        <label for="e_ref">Referência</label>
                                        <input type="text" class="form-control" placeholder="Referência" name="e_referencia" id="e_ref"
                                               @if($pessoa->id <> '' && $endereco <> '')
                                               value="{{$endereco->referencia}}"
                                               @elseif($pessoa->id <> '' && $endereco = '')
                                               value=""
                                        @else
                                                @endif/>
                                    </div>
                                </div>{{--End Form--}}
                                <div class="col-md-6"><!-- /Lista de Endereços -->
                                    <table class="table table-striped table-bordered datatables" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Descrição</th>
                                            <th>CEP</th>
                                            <th>Ações</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($pessoa->enderecos <> '[]')
                                            @forelse($pessoa->enderecos as $endereco)
                                                <tr>
                                                    <td >{{$endereco->descricao}}</td>
                                                    <td>{{$endereco->cep}}</td>
                                                    <td><a class="btn btn-info" href="{{route('pessoa.endereco.editar', $endereco->id)}}"><i class="fa fa-edit"></i>Editar</a> <a class="btn btn-danger" href="{{route('pessoa.endereco.excluir', $endereco->id)}}"><i class="fa fa-trash"></i>Excluir</a></td>
                                                </tr>
                                            @empty
                                            @endforelse
                                        @endif
                                        </tbody>
                                    </table>
                                </div><!-- End Lista -->
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>
                                <a href="{{route('pessoa.detalhe', $pessoa->id)}}" class="btn btn-info"><i class="fa fa-plus"></i> Novo Endereço</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop