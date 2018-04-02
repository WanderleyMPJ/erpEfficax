<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao', 60)->nullable();
            $table->string('nome', 20);
            $table->timestamps();

        });
        Schema::create('pessoa__grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pessoa_id')->unsigned();
            $table->integer('grupo_id')->unsigned();
            $table->timestamps();

            $table->foreign('pessoa_id')->references('id')->on('pessoas')->onDelete('cascade');

            $table->foreign('grupo_id')->references('id')->on('gupos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos');
        Schema::dropIfExists('pessoa_grupos');
    }
}
