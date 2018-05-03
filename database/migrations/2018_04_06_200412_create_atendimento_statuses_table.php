<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtendimentoStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimento_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao', 100);
            $table->timestamps();
        });



        DB::table('atendimento_statuses')->insert([
           'id' => '1',
           'descricao' => 'Pendente',
        ]);
        DB::table('atendimento_statuses')->insert([
           'id' => '2',
           'descricao' => 'Agendado',
        ]);
        DB::table('atendimento_statuses')->insert([
           'id' => '3',
           'descricao' => 'Transferido',
        ]);
        DB::table('atendimento_statuses')->insert([
           'id' => '4',
           'descricao' => 'Concluído',
        ]);



        DB::table('permissions')->insert([
            'nome' => 'AtendimentoStatus_View',
            'descricao' => 'Visualizar Atendimento Status',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'AtendimentoStatus_Cadastrar',
            'descricao' => 'Cadastrar Atendimento Status',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'AtendimentoStatus_Editar',
            'descricao' => 'Editar Atendimento Status',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'AtendimentoStatus_Deletar',
            'descricao' => 'Deletar Atendimento Status',
        ]);
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('permissions')->where('nome', 'like', 'AtendimentoStatus%')->delete(); 
        Schema::dropIfExists('atendimento_statuses');
    }
}
