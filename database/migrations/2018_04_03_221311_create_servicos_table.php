<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao', 80);

            $table->timestamps();
        });

        DB::table('permissions')->insert([
            'nome' => 'Servico_View',
            'descricao' => 'Visualizar Servicos',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'Servico_Cadastrar',
            'descricao' => 'Cadastrar Servicos',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'Servico_Editar',
            'descricao' => 'Editar Servicos',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'Servico_Deletar',
            'descricao' => 'Deletar Servicos',
        ]);
 

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('permissions')->where('nome', 'like', 'Servico%')->delete();
        Schema::dropIfExists('servicos');
    }
}
