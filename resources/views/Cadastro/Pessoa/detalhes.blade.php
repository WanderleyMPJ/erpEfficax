@extends('layouts._menu')
@section('menutop')
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ route('home') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('pessoa') }}" class="tip-bottom">Pessoa</a> <a href="{{ route('pcadastro') }}" class="current">Detalhes</a></div>


    </div>
@endsection
@section('content')

    <div class="row-fluid">
            <div class="widget-content">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-plus"></i> </span>
                        <h5>Dados Básicos</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="#" method="get" class="form-horizontal">
                           <div id="form-wizard-1" class="step">
                            <div class="control-group">
                                <label for="checkboxes" class="control-label">Tipo de Pessoa:</label>
                                <div class="controls">
                                    <div data-toggle="buttons-radio" class="btn-group">
                                        <button class="btn btn-primary" type="button"><i class="icon-user"></i> Física</button>
                                        <button class="btn btn-primary" type="button"><i class="icon-legal"></i> Jurídica</button>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="nm_rs">Nome | Razão Social:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Nome | Razão Social" name="nm_rs" id="nm_rs" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="ap_nf">Apelido | Nome Fantasia:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Apelido | Nome Fantasia" name="ap_nf" id="ap_nf" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="cp_cn">CPF | CNPJ:</label>
                                <div class="controls">
                                    <input type="text"  class="span11" placeholder="CPF | CNPJ"  name="cp_cn" id="cp_cn" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="rg_inscest">RG | Inscrição Estadual:</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="RG | Inscrição Estadual" name="rg_inscest" id="rg_inscest"/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="ativo">Inativo</label>
                                <div class="controls">
                                    <input id="ativo" type="checkbox" name="ativo" />
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary"> <i class="icon-home"></i> Adicionar Endereço</button>
                                <button type="submit" class="btn btn-primary"> <i class="icon-phone"></i> Adicionar Telefone</button>
                                <div id="status"></div>
                            </div>
                           </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div
@endsection