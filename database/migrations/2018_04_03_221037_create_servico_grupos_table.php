<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicoGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servico_grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao', 60);
            
            $table->timestamps();
        });

        DB::table('permissions')->insert([
            'nome' => 'ServicoGrupo_View',
            'descricao' => 'Visualizar Servico Grupos',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'ServicoGrupo_Cadastrar',
            'descricao' => 'Cadastrar Servico Grupos',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'ServicoGrupo_Editar',
            'descricao' => 'Editar Servico Grupos',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'ServicoGrupo_Deletar',
            'descricao' => 'Deletar Servico Grupos',
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('permissions')->where('nome', 'like', 'ServicoGrupo%')->delete();
        Schema::dropIfExists('servico_grupos');
    }
}
