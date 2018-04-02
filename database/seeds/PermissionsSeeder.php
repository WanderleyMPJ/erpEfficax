<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
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

// Pessoa
        DB::table('permissions')->insert([
            'nome' => 'Pessoa_Cadastrar',
            'descricao' => 'Cadastrar Pessoas',
        ]);

        DB::table('perfil_permission')->insert([
            'permission_id' => 1,
            'perfil_id' => 2,
        ]);
    }

}
