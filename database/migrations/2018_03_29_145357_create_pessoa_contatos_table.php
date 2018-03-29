<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoaContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_contatos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pessoa_id')->unsigned();
            $table->string('descricao', 60);
            $table->string('email', 150);
            $table->string('telefone', 30);
            $table->timestamps();

            $table->index('telefone');
            $table->index('email');

            $table->foreign('pessoa_id')->references('id')->on('pessoas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa_contatos');
    }
}
