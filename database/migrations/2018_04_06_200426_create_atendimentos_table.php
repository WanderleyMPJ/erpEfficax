<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtendimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('protocolo', 10);
            $table->DateTime('data_inicio');
            $table->DateTime('data_termino')->nullable();
            $table->integer('pessoa_id')->unsigned();
            $table->string('solicitante', 50);
            $table->integer('atendimentoorigem_id')->unsigned();
            $table->integer('atendimentostatus_id')->unsigned();
            $table->string('solicitacao');
            $table->timestamps();
            
        });
        
        Schema::table('atendimentos', function (Blueprint $table)
        {
            $table->foreign('atendimentostatus_id')->references('id')->on('atendimento_statuses')->onDelete('cascade');
            $table->foreign('pessoa_id')->references('id')->on('pessoas')->onDelete('cascade');
            $table->foreign('atendimentoorigem_id')->references('id')->on('Atendimento_Origens')->onDelete('cascade');

        });
            
        DB::table('permissions')->insert([
            'nome' => 'Atendimento_View',
            'descricao' => 'Visualizar Atendimentos',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'Atendimento_Cadastrar',
            'descricao' => 'Cadastrar Atendimento',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'Atendimento_Editar',
            'descricao' => 'Editar Atendimento',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'Atendimento_Deletar',
            'descricao' => 'Deletar Atendimento',
        ]);
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('permissions')->where('nome', 'like', 'Atendimento_%')->delete();
        Schema::dropIfExists('atendimentos');
    }
}
