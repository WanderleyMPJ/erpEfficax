<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoaGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Descricao', 50);
            $table->timestamps();
        });
        
        Schema::create('pessoa_x_grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pessoa_id')->unsigned();
            $table->integer('pessoagrupo_id')->unsigned();
            $table->timestamps();

           
            $table->foreign('pessoa_id')->references('id')->on('pessoas')->onDelete('cascade');
            $table->foreign('pessoagrupo_id')->references('id')->on('pessoa_grupos')->onDelete('cascade');
            
          //  $table->foreign('pessoa_grupo_id')->references('id')->on('pessoa_grupos')->onDelete('cascade');    
    
            
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa_x_grupos');
        Schema::dropIfExists('pessoa_grupos');
    }
}
