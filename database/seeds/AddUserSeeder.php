<?php

use Illuminate\Database\Seeder;

class AddUserSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //  factory('App\User',1)->create();

        DB::table('users')->insert([
            'name' => 'Wanderley',
            'email' => 'wanderleywm@hotmail.com',
            'password' =>bcrypt( '123456' ), // secret
            'remember_token' => str_random(10),
            'ativo'=> 1,
        ]);
        DB::table('users')->insert([
            'name' => 'Pedro',
            'email' => 'efficax.pedro@gmail.com',
            'password' => bcrypt( '123456'), // secret
            'remember_token' => str_random(10),
            'ativo'=> 1,
        ]);

        DB::table('perfils')->insert([
            'nome' => 'Admin',
            'descricao' => 'Administrador',
        ]);

        DB::table('perfils')->insert([
            'nome' => 'Suporte',
            'descricao' => 'Financeiro',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'User_View',
            'descricao' => 'Visualizar Usuarios',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'User_Cadastrar',
            'descricao' => 'Cadastrar Usuarios',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'User_Editar',
            'descricao' => 'Editar Usuarios',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'User_Deletar',
            'descricao' => 'Deletar Usuarios',
        ]);
        DB::table('permissions')->insert([
            'nome' => 'Pessoa_view',
            'descricao' => 'Ver Pessoa',
        ]);
        DB::table('permissions')->insert([
            'nome' => 'Pessoa_create',
            'descricao' => 'Inserir Pessoa',
        ]);

        DB::table('perfil_user')->insert([
            'user_id' => 1,
            'perfil_id' => 1,
        ]);

        DB::table('perfil_user')->insert([
            'user_id' => 2,
            'perfil_id' => 1,
        ]);

        DB::table('perfil_permission')->insert([
            'permission_id' => 1,
            'perfil_id' => 2,
        ]);
    }

}
