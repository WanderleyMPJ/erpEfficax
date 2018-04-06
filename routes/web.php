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
Route::get('/pessoa/detalhe/{id}', 'Cadastro\PessoaController@detalhe')->name('pessoa.detalhe');
Route::get('/pessoa/cadastar', 'Cadastro\PessoaController@cadastrar')->name('pessoa.cadastrar');
Route::get('/pessoa/salvar', 'Cadastro\PessoaController@salvar')->name('pessoa.salvar');
Route::get('/pessoa/atualizar/{id}', 'Cadastro\PessoaController@atualizar')->name('pessoa.atualizar');
/*Pessoas Gupo*/
Route::get('/pessoagrupo', 'Cadastro\PessoaGrupoController@index')->name('pessoagrupo.index');
Route::get('/pessoagrupo/detalhe/{id}', 'Cadastro\PessoaGrupoController@detalhe')->name('pessoagrupo.detalhe');
Route::get('/pessoagrupo/cadastrar', 'Cadastro\PessoaGrupoController@cadastrar')->name('pessoagrupo.cadastrar');
Route::get('/pessoagrupo/salvar', 'Cadastro\PessoaGrupoController@salvar')->name('pessoagrupo.salvar');
Route::get('/pessoagrupo/atualizar/{id}', 'Cadastro\PessoaGrupoController@atualizar')->name('pessoagrupo.atualizar');
/*End Pessoas Grupo*/
/*End Pessoas*/


Route::get('/home', 'HomeController@index')->name('home');