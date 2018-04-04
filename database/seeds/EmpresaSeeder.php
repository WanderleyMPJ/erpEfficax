<?php

use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('empresas')->insert([
            'pessoa_id' => 1,
            'descricao' => 'Efficax Soluções',
        ]);

        DB::table('empresas')->insert([
            'pessoa_id' => 2,
            'descricao' => 'Efficax Contabilidade',
        ]);
    }

}
