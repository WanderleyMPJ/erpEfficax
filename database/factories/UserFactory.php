<?php

use Faker\Generator as Faker;

/*
  |--------------------------------------------------------------------------
  | Model Factories
  |--------------------------------------------------------------------------
  |
  | This directory should contain each of the model factory definitions for
  | your application. Factories provide a convenient way to generate new
  | model instances for testing / seeding your application's database.
  |
 */

$factory->define(App\User::class, function (Faker $faker) {
    /*   return [
      'name' => $faker->name,
      'email' => $faker->unique()->safeEmail,
      'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
      'remember_token' => str_random(10),
      ];
     */
    return [
        'name' => 'Wanderley',
        'email' => 'wanderleywm@hotmail.com',
        'password' => '123456', // secret
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => 'Pedro',
        'email' => 'pedro.efficax@gmail.com',
        'password' => '123456', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Cadastro\Perfil::class, function (Faker $faker) {
    return [
        'nome' => 'Admin',
        'descricao' => 'Administrador',
     ];
});

$factory->define(App\Cadastro\Perfil::class, function (Faker $faker) {
    return [
        'nome' => 'Suporte',
        'descricao' => 'Financeiro',
     ];
});


$factory->define(App\Cadastro\Permission::class, function (Faker $faker) {
    return [
        'nome' => 'User_View',
        'descricao' => 'Visualizar Usuarios',
     ];
});

$factory->define(App\Cadastro\Permission::class, function (Faker $faker) {
    return [
        'nome' => 'User_Cadastrar',
        'descricao' => 'Cadastrar Usuarios',
     ];
});

$factory->define(App\Cadastro\Permission::class, function (Faker $faker) {
    return [
        'nome' => 'User_Editar',
        'descricao' => 'Editar Usuarios',
     ];
});

$factory->define(App\Cadastro\Permission::class, function (Faker $faker) {
    return [
        'nome' => 'User_Deletar',
        'descricao' => 'Deletar Usuarios',
     ];
});

$factory->define(App\Cadastro\User_Perfil::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'perfil_id' => 1,
     ];
});

$factory->define(App\Cadastro\User_Perfil::class, function (Faker $faker) {
    return [
        'user_id' => 2,
        'perfil_id' => 2,
     ];
});

$factory->define(App\Cadastro\Permission_Perfil::class, function (Faker $faker) {
    return [
        'permission_id' => 1,
        'perfil_id' => 2,
     ];
});

