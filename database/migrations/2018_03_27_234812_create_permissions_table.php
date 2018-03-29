<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 50);
            $table->string('descricao', 200);
            $table->timestamps();
        });
        
        Schema::create('perfil_permission', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('permission_id')->unsigned();
            $table->integer('perfil_id')->unsigned();
            
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            
            $table->foreign('perfil_id')->references('id')->on('perfils')->onDelete('cascade');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfil_permission');
        Schema::dropIfExists('permissions');
    }
}
