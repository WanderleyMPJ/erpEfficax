<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtendimentoOrigensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimento_origens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao', 100);
            $table->timestamps();
        });
    

        DB::table('permissions')->insert([
            'nome' => 'AtendimentoOrigem_View',
            'descricao' => 'Visualizar Atendimento Origens',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'AtendimentoOrigem_Cadastrar',
            'descricao' => 'Cadastrar Atendimento Origens',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'AtendimentoOrigem_Editar',
            'descricao' => 'Editar Atendimento Origens',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'AtendimentoOrigem_Deletar',
            'descricao' => 'Deletar Atendimento Origens',
        ]);

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('permissions')->where('nome', 'like', 'AtendimentoOrigem%')->delete();
        Schema::dropIfExists('atendimento_origens');
    }
}