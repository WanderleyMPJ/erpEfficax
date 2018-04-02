<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/teste', function () {return special_ucwords('WANDERLEY MACEDO DE PINHEIRO JÚNIOR');});
Route::get('/teste2', function () {return verificaTabela('permissions');});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', 'Cadastro\UserController@index')->name('user');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('roles-permissions', 'HomeController@rolespermissions')->name('perfil');
Route::get('naoautorizado', function(){
    view('error.naoautorizado');
});
Route::get('roles-permissions', 'HomeController@rolespermissions')->name('perfil');
/*Pessoas*/
Route::get('/pessoa', 'Cadastro\PessoaController@index')->name('pessoa.index');
Route::get('/pessoa/detalhe/{id}',['uses'=>'Cadastro\PessoaController@detalhe', 'as'=>'pessoa.detalhe']);
Route::get('/pessoa_cadastro', 'Cadastro\PessoaController@create')->name('pessoa.cadastro');
Route::get('/pessoa/salvar', ['uses'=>'Cadastro\PessoaController@novaPessoa','as'=>'pessoa.salvar']);
/*End Pessoas*/
/*Telefones*/
Route::post('/telefone/salvar/{id}',['uses'=>'Cadastro\PessoaContato@salvar','as'=>'telefone.salvar']);
/*End Telefones*/