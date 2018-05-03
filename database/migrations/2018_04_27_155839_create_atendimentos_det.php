<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtendimentosDet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimentos_det', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('atendimento_id')->unsigned();
            $table->integer('atendente_id')->unsigned();
            $table->string('movimentacao');
            $table->dateTime('data');
            $table->timestamps();
        });


        Schema::table('atendimentos_det', function (Blueprint $table)
        {
            $table->foreign('atendimento_id')->references('id')->on('atendimentos')->onDelete('cascade');
            $table->foreign('atendente_id')->references('id')->on('users')->onDelete('cascade');

        });


        DB::table('permissions')->insert([
            'nome' => 'AtendimentoDet_View',
            'descricao' => 'Visualizar Movimento Solicitação',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'AtendimentoDet_Cadastrar',
            'descricao' => 'Cadastrar Movimento Solicitação',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'AtendimentoDet_Editar',
            'descricao' => 'Editar Movimento Solicitação',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'AtendimentoDet_Deletar',
            'descricao' => 'Deletar Movimentacao Solicitação',
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('permissions')->where('nome', 'like', 'AtendimentoDet_%')->delete();
        Schema::dropIfExists('atendimentos_det');
    }
}
