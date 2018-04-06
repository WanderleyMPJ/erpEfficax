<?php

$this->group(['middleware' => ['auth'] ], function(){
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/teste', function () {return special_ucwords('WANDERLEY MACEDO DE PINHEIRO JÚNIOR');});
Route::get('/teste2', function () {return verificaTabela('permissions');});
Route::get('/testecnpj', 'Cadastro\PessoaController@getCnpj')->name('pessoa.cnpj');


Route::get('/user', 'Cadastro\UserController@index')->name('user');
Route::get('/userpermissions', 'Cadastro\UserController@userpermissions')->name('userpermissions');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('naoautorizado', function(){
    view('error.naoautorizado');
});

Route::get('roles-permissions', 'HomeController@rolespermissions')->name('perfil');
/*Pessoas*/
Route::get('/pessoa', 'Cadastro\PessoaController@index')->name('pessoa.index');
Route::get('/pessoagrupo', 'Cadastro\PessoaGrupoController@index')->name('pessoagrupo.index');
Route::get('/pessoagrupo/detalhe/{id}', 'Cadastro\PessoaGrupoController@detalhe')->name('pessoagrupo.detalhe');
Route::get('/pessoagrupo/detalhe', 'Cadastro\PessoaGrupoController@detalhe')->name('pessoagrupo.cadastro');

Route::get('/pessoa/detalhe/{id}', 'Cadastro\PessoaController@detalhe')->name('pessoa.detalhe');
Route::get('/pessoa/cadastar', 'Cadastro\PessoaController@create')->name('pessoa.cadastrar');
Route::get('/pessoa/salvar', 'Cadastro\PessoaController@novaPessoa')->name('pessoa.salvar');
Route::get('/pessoa/atualizar/{id}', 'Cadastro\PessoaController@atualizarPessoa')->name('pessoa.atualizar');
/*End Pessoas*/
/*Telefones*/
Route::post('/telefone/salvar/{id}',['uses'=>'Cadastro\PessoaContato@salvar','as'=>'telefone.salvar']);
/*End Telefones*/

Route::get('/home', 'HomeController@index')->name('home');