<?php

$this->group(['middleware' => ['auth'] ], function(){
    Route::get('/home', 'HomeController@index')->name('home');

/*Pessoas*/
Route::get('/pessoa', 'Cadastro\PessoaController@index')->name('pessoa.index');
Route::get('/pessoa/detalhe/{id}', 'Cadastro\PessoaController@detalhe')->name('pessoa.detalhe');
Route::get('/pessoa/cadastar', 'Cadastro\PessoaController@cadastrar')->name('pessoa.cadastrar');
Route::get('/pessoa/salvar', 'Cadastro\PessoaController@salvar')->name('pessoa.salvar');
Route::get('/pessoa/atualizar/{id}', 'Cadastro\PessoaController@atualizar')->name('pessoa.atualizar');
Route::get('/pessoa/find', 'Cadastro\PessoaController@find');

/*Gupo*/
Route::get('/pessoagrupo', 'Cadastro\PessoaGrupoController@index')->name('pessoagrupo.index');
Route::get('/pessoagrupo/detalhe/{id}', 'Cadastro\PessoaGrupoController@detalhe')->name('pessoagrupo.detalhe');
Route::get('/pessoagrupo/cadastrar', 'Cadastro\PessoaGrupoController@cadastrar')->name('pessoagrupo.cadastrar');
Route::get('/pessoagrupo/salvar', 'Cadastro\PessoaGrupoController@salvar')->name('pessoagrupo.salvar');
Route::get('/pessoagrupo/atualizar/{id}', 'Cadastro\PessoaGrupoController@atualizar')->name('pessoagrupo.atualizar');
/*End Grupo*/

/*Contato*/
Route::get('/pessoa/contato/salvar/{id}', 'Cadastro\PessoaContatoController@salvar')->name('pessoa.contato.salvar');
Route::get('/pessoa/contato/excluir/{id}', 'Cadastro\PessoaContatoController@excluir')->name('pessoa.contato.excluir');
Route::get('/pessoa/contato/editar/{id}', 'Cadastro\PessoaContatoController@editar')->name('pessoa.contato.editar');
Route::get('/pessoa/contato/atualizar/{id}', 'Cadastro\PessoaContatoController@atualizar')->name('pessoa.contato.atualizar');
/*End Contato*/

/*Endereco*/
Route::get('/pessoa/endereco/salvar/{id}', 'Cadastro\PessoaEnderecoController@salvar')->name('pessoa.endereco.salvar');
Route::get('/pessoa/endereco/excluir/{id}', 'Cadastro\PessoaEnderecoController@excluir')->name('pessoa.endereco.excluir');
Route::get('/pessoa/endereco/editar/{id}', 'Cadastro\PessoaEnderecoController@editar')->name('pessoa.endereco.editar');
Route::get('/pessoa/endereco/atualizar/{id}', 'Cadastro\PessoaEnderecoController@atualizar')->name('pessoa.endereco.atualizar');
/*End  Endereco*/
    
    
/* Atendimento Origem */
Route::get('/atendimento/origem', 'Atendimento\AtendimentoOrigemController@index')->name('atendimentoorigem.index');
Route::get('/atendimento/origem/find', 'Atendimento\AtendimentoOrigemController@find');
Route::get('/atendimento/origem/detalhe/{id}', 'Atendimento\AtendimentoOrigemController@detalhe')->name('atendimento.origem.detalhe');
Route::get('/atendimento/origem/cadastrar', 'Atendimento\AtendimentoOrigemController@cadastrar')->name('atendimento.origem.cadastrar');
Route::get('/atendimento/origem/salvar', 'Atendimento\AtendimentoOrigemController@salvar')->name('atendimento.origem.salvar');
Route::get('/atendimento/origem/atualizar/{id}', 'Atendimento\AtendimentoOrigemController@atualizar')->name('atendimento.origem.atualizar');
    
/* Atendimento status */
Route::get('/atendimento/status', 'Atendimento\AtendimentoStatusController@index')->name('atendimento.status.index');
Route::get('/atendimento/status/detalhe/{id}', 'Atendimento\AtendimentoStatusController@detalhe')->name('atendimento.status.detalhe');
Route::get('/atendimento/status/cadastrar', 'Atendimento\AtendimentoStatusController@cadastrar')->name('atendimento.status.cadastrar');
Route::get('/atendimento/status/salvar', 'Atendimento\AtendimentoStatusController@salvar')->name('atendimento.status.salvar');
Route::get('/atendimento/status/atualizar/{id}', 'Atendimento\AtendimentoStatusController@atualizar')->name('atendimento.status.atualizar');

/* Atendimentos */
Route::get('/atendimento/dashboard', 'Atendimento\AtendimentoController@index')->name('atendimento.dashboard');
Route::get('/atendimento/cadastrar', 'Atendimento\AtendimentoController@cadastrar')->name('atendimento.cadastrar');
Route::get('/atendimento/editar/{id}', 'Atendimento\AtendimentoController@editar')->name('atendimento.editar');
Route::get('/atendimento/concluir/{id}', 'Atendimento\AtendimentoController@concluir')->name('atendimento.concluir');
Route::get('/atendimento/agendar/{id}', 'Atendimento\AtendimentoController@agendar')->name('atendimento.agendar');
Route::get('/atendimento/transferir/{id}', 'Atendimento\AtendimentoController@transerir')->name('atendimento.transferir');
Route::get('/atendimento/atualizar/{id}', 'Atendimento\AtendimentoController@atualizar')->name('atendimento.atualizar');
Route::get('/atendimento/salvarsolicitacao', 'Atendimento\AtendimentoController@SalvarSolicitacao')->name('atendimento.atualizar');

//usuarios
Route::get('/user', 'Cadastro\UserController@index')->name('user');
Route::get('/userpermissions', 'Cadastro\UserController@userpermissions')->name('userpermissions');

//Servicos*/
Route::get('/servico', 'Cadastro\ServicoController@index')->name('servico.index');
Route::get('/servico/detalhe/{id}', 'Cadastro\ServicoController@detalhe')->name('servico.detalhe');
Route::get('/servico/cadastrar', 'Cadastro\ServicoController@cadastrar')->name('servico.cadastrar');
Route::get('/servico/salvar', 'Cadastro\ServicoController@salvar')->name('servico.salvar');
Route::get('/servico/atualizar/{id}', 'Cadastro\ServicoController@atualizar')->name('servico.atualizar');

//FINANCEIRO*/

Route::get('/mov/lancamento', 'Financeiro\MovController@lancamento')->name('mov.lancamento');
Route::get('/mov/salvar', 'Financeiro\MovController@salvar')->name('mov.salvar');


//Cadastro plano de contas
    Route::get('planocontas','Cadastro\Financeiro\PlanoContasController@index')->name('planocontas.index');
    Route::post('planoconta\salvar','Cadastro\Financeiro\PlanoContasController@salvar')->name('planocontas.salvar');

});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/teste', function () {return special_ucwords('WANDERLEY MACEDO DE PINHEIRO JÚNIOR');});
Route::get('/teste2', function () {return verificaTabela('permissions');});
Route::get('/testecnpj', 'Cadastro\PessoaController@getCnpj')->name('pessoa.cnpj');



Route::get('naoautorizado', function(){
    view('error.naoautorizado');
});

Route::get('roles-permissions', 'HomeController@rolespermissions')->name('perfil');

/*Empresas*/
Route::get('/empresa', 'Cadastro\EmpresaController@index')->name('empresa.index');
Route::get('/empresa/cadastrar', 'Cadastro\EmpresaController@cadastrar')->name('empresa.cadastrar');
Route::get('/empresa/detalhe/{id}', 'Cadastro\EmpresaController@detalhe')->name('empresa.detalhe');
Route::get('/empresa/salvar', 'Cadastro\EmpresaController@salvar')->name('empresa.salvar');
Route::get('/empresa/atualizar/{id}', 'Cadastro\EmpresaController@atualizar')->name('empresa.atualizar');
/*End Empresa*/





Route::get('/home', 'HomeController@index')->name('home');