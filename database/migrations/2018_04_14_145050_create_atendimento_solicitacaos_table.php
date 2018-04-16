<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtendimentoSolicitacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimento_solicitacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('atendimento_id')->unsigned();

            
            $table->integer('servico_id')->unsigned();
            $table->string('descricao', 200);
            $table->double('quantidade');
            
            $table->timestamps();
        });
        
        
        Schema::table('atendimento_solicitacaos', function (Blueprint $table)
        {
            $table->foreign('atendimento_id')->references('id')->on('atendimentos')->onDelete('cascade');
            $table->foreign('servico_id')->references('id')->on('servicos')->onDelete('cascade');
         
        });
            
            
        DB::table('permissions')->insert([
            'nome' => 'AtendimentoScolicitacao_View',
            'descricao' => 'Visualizar Solicitação',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'AtendimentoScolicitacao_Cadastrar',
            'descricao' => 'Cadastrar Solicitação',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'AtendimentoScolicitacao_Editar',
            'descricao' => 'Editar Solicitação',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'AtendimentoScolicitacao_Deletar',
            'descricao' => 'Deletar Solicitação',
        ]);
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('permissions')->where('nome', 'like', 'AtendimentoSolicitacao_%')->delete();
        Schema::dropIfExists('atendimento_solicitacaos');
    }
}
