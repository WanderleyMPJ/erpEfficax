@extends('layouts._menu')
@section('menutop')
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ route('home') }}" title="Ir Para Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('pessoa.index') }}" class="tip-bottom">Pessoa</a> <a href="{{ route('pessoa.cadastrar') }}" class="current">Cadastro</a></div>
    </div>
@endsection
@section('content')
<div class="widget-box">
    <form @if($tipo=='0') action="{{route('pessoa.atualizar', $pessoa->id)}}" @else action="{{ route('pessoa.salvar') }}" @endif method="get" class="form-horizontal">
    <div class="widget-title"> <span class="icon"> <i class="icon-plus"></i> </span>
       <h5>Cadastro de Pessoas</h5>
    </div>
    <div class="row-fluid">
        <div class="widget-content">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon">  <input type="checkbox" checked id="tp_pessoa" name="tipo_pessoa" class="invisible" value="juridica"> {{--<i class="icon-plus"></i> --}}</span>
                    <h5>Dados Básicos</h5>
                </div>
                <div class="widget-content nopadding">
                        <div id="form-wizard-1" class="step">
                            <div class="control-group">
                                <label for="checkboxes" class="control-label">Tipo de Pessoa:</label>
                                <div class="controls">
                                    <div data-toggle="buttons-radio" class="btn-group">

                                        <button @if($tipo=='0' && $pessoa->tipo_pessoa == 'fisica') class="btn btn-primary active" @else class="btn btn-primary" @endif  onclick="pessoa(0)" type="button"><i class="icon-user"></i> Física</button>
                                        <button @if($tipo=='0' && $pessoa->tipo_pessoa == 'juridica') class="btn btn-primary active" @else @if($tipo=='1') class="btn btn-primary active" @else class="btn btn-primary" @endif @endif onclick="pessoa(1)" type="button"><i class="icon-legal"></i> Jurídica</button>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="nm_rs">Nome | Razão Social:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Razão Social" name="nome" id="nm_rs" @if($tipo=='0') value="{{$pessoa->nome}}" @else value="Efficax Soluções" @endif/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="ap_nf">Apelido | Nome Fantasia:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Nome Fantasia" name="fantasia" id="ap_nf" @if($tipo=='0') value="{{$pessoa->fantasia}}" @else value="Efficax" @endif/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="cp_cn">CPF | CNPJ:</label>
                                <div class="controls">
                                    <input type="text"  class="span11" placeholder="CNPJ"  name="cnpj_cpf" id="cp_cn" @if($tipo=='0') value="{{$pessoa->cnpj_cpf}}" @endif />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="rg_inscest">RG | Inscrição Estadual:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Inscrição Estadual" name="rg_inscest" id="rg_inscest" @if($tipo=='0') value="{{$pessoa->rg_inscest}}" @else value="000" @endif />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Grupo</label>
                                <div class="controls">
                                    <select multiple name="grupo[]" >
                                        @forelse($grupo as $grupo)
                                        <option @if($tipo=='0')
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
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="ativo">Inativo</label>
                                <div class="controls">
                                    <input id="ativo" type="checkbox" name="ativo" value="0"  @if($tipo==0 && $pessoa->ativo == 0) checked @endif/>
                                </div>
                            </div>
                        </div>
                   {{-- </form>--}}
                </div>
            </div>
        </div>
    </div>
   <div class="row-fluid">
        <div class="widget-content">
           <div class="widget-box">
               <div class="widget-title"> <span class="icon"> <i class="icon-plus"></i> </span>
                   <h5>Contatos</h5>
               </div>
               <div class="widget-content nopadding">
                       <div id="form-wizard-2" class="step">
                           <div class="control-group">
                               <label class="control-label" for="c_desc">Descrição:</label>
                               <div class="controls">
                                   <input type="text" class="span11" placeholder="Descrição" name="c_descricao" id="c_desc" @if($tipo=='0' && $pessoa->contatos <> '[]') value="{{$pessoa->contatos[0]->descricao}}" @elseif($tipo=='0' && $pessoa->contatos = '[]') value="" @else value="Pessoal" @endif/>
                               </div>
                           </div>
                           <div class="control-group">
                               <label class="control-label" for="c_telefone">Telefone:</label>
                               <div class="controls">
                                   <input type="text" class="span8" placeholder="Telefone" name="c_telefone" id="telefone"
                                          @if($tipo=='0' && $pessoa->contatos <> '[]')
                                          value="{{$pessoa->contatos[0]->telefone}}"
                                          @elseif($tipo=='0' && $pessoa->contatos = '[]')
                                          value=""
                                          @else  @endif/>
                               </div>
                           </div>
                           <div class="control-group">
                               <label class="control-label" for="c_mail">E-mail:</label>
                               <div class="controls">
                                   <input type="text"  class="span11" placeholder="E-mail"  name="c_email" id="c_mail" @if($tipo=='0' && $pessoa->contatos <> '[]') value="{{$pessoa->contatos[0]->email}}" @elseif($tipo=='0' && $pessoa->contatos = '[]') value="" @else value="efficax.pedrogmail.com" @endif/>
                               </div>
                           </div>
                       </div>
               </div>
           </div>
       </div>
   </div>
   <div class="row-fluid">
       <div class="widget-content">
           <div class="widget-box">
               <div class="widget-title">
                   <span class="icon"> <i class="icon-plus"></i> </span>
                   <h5>Endereços</h5>
               </div>
               <div class="widget-content nopadding">

                       <div id="form-wizard-3" class="step">
                           <div class="control-group">
                               <label class="control-label" for="e_desc">Descrição:</label>
                               <div class="controls">
                                   <input type="text" class="span11" placeholder="Descrição" name="e_descricao" id="e_desc" @if($tipo=='0' && $pessoa->enderecos <> '[]') value="{{$pessoa->enderecos[0]->descricao}}" @elseif($tipo=='0' && $pessoa->enderecos = '[]') value="" @else value="Casa" @endif/>
                               </div>
                           </div>
                           <div class="control-group">
                               <label class="control-label" for="e_cep">CEP:</label>
                               <div class="controls">
                                   <input type="text" class="span11" placeholder="CEP" name="e_cep" id="e_cep" @if($tipo=='0' && $pessoa->enderecos <> '[]') value="{{$pessoa->enderecos[0]->cep}}" @elseif($tipo=='0' && $pessoa->enderecos = '[]') value="" @else value="76808209" @endif/>
                               </div>
                           </div>
                           <div class="control-group">
                               <label class="control-label" for="e_estado">Estado:</label>
                               <div class="controls">
                                   <input type="text"  class="span11" placeholder="Estado"  name="e_uf" id="e_estado" @if($tipo=='0' && $pessoa->enderecos <> '[]') value="{{$pessoa->enderecos[0]->uf}}" @elseif($tipo=='0' && $pessoa->enderecos = '[]') value="" @else value="RO" @endif/>
                               </div>
                           </div>
                           <div class="control-group">
                               <label class="control-label" for="e_cidade">Cidade:</label>
                               <div class="controls">
                                   <input type="text"  class="span11" placeholder="Cidade"  name="e_cidade" id="e_cidade" @if($tipo=='0' && $pessoa->enderecos <> '[]') value="{{$pessoa->enderecos[0]->cidade}}" @elseif($tipo=='0' && $pessoa->enderecos = '[]') value="" @else value="Porto Velho" @endif/>
                               </div>
                           </div>
                           <div class="control-group">
                               <label class="control-label" for="e_bairro">Bairro:</label>
                               <div class="controls">
                                   <input type="text"  class="span11" placeholder="Bairro"  name="e_bairro" id="e_bairro" @if($tipo=='0' && $pessoa->enderecos <> '[]') value="{{$pessoa->enderecos[0]->bairro}}" @elseif($tipo=='0' && $pessoa->enderecos = '[]') value="" @else value="Conceição" @endif/>
                               </div>
                           </div>
                           <div class="control-group">
                               <label class="control-label" for="e_logr">Loradouro:</label>
                               <div class="controls">
                                   <input type="text" class="span11" placeholder="Rua, Número" name="e_logradouro" id="e_logr" @if($tipo=='0' && $pessoa->enderecos <> '[]') value="{{$pessoa->enderecos[0]->logradouro}}" @elseif($tipo=='0' && $pessoa->enderecos = '[]') value="" @else value="Magnólia, 3784" @endif/>
                               </div>
                           </div>
                           <div class="control-group">
                               <label class="control-label" for="e_comp">Complemento:</label>
                               <div class="controls">
                                   <input type="text" class="span11" placeholder="Complemento" name="e_complemento" id="e_comp" @if($tipo=='0' && $pessoa->enderecos <> '[]') value="{{$pessoa->enderecos[0]->complemento}}" @elseif($tipo=='0' && $pessoa->enderecos = '[]') value="" @else value="Casa" @endif/>
                               </div>
                           </div>
                           <div class="control-group">
                               <label class="control-label" for="e_ref">Referência:</label>
                               <div class="controls">
                                   <input type="text" class="span11" placeholder="Referência" name="e_referencia" id="e_ref" @if($tipo=='0' && $pessoa->enderecos <> '[]') value="{{$pessoa->enderecos[0]->referencia}}" @elseif($tipo=='0' && $pessoa->enderecos = '[]') value="" @else value="Perto Do Shopping" @endif/>
                               </div>
                           </div>
                       </div>

               </div>
           </div>
       </div>
   </div>
   <div class="form-actions">
       <button type="submit" class="btn btn-primary"> <i class="icon-remove"></i> Cancelar</button>
       <button type="submit" class="btn btn-primary"> <i class="icon-save"></i> Salvar</button>
       <div id="status"></div>
   </div>
        </form>
</div>
@endsection