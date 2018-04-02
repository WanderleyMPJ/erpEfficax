<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoaEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa__enderecos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pessoa_id')->unsigned();
            $table->string('descricao', 60);
            $table->string('cep', 10);
            $table->string('rua', 50);
            $table->string('num', 6);
            $table->string('bairro', 50);
            $table->string('cidade', 25);
            $table->string('estado', 4);
            $table->timestamps();

            $table->index('descricao');
            $table->index('cep');

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
        Schema::dropIfExists('pessoa__enderecos');
    }
}
