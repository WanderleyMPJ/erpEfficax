<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao', 100);
            $table->integer('pessoa_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('empresas', function (Blueprint $table) {
            $table->foreign('pessoa_id')->references('id')->on('pessoas');
        });
       
        
        DB::table('permissions')->insert([
            'nome' => 'Empresa_View',
            'descricao' => 'Visualizar Empresas',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'Empresa_Cadastrar',
            'descricao' => 'Cadastrar Empresas',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'Empresa_Editar',
            'descricao' => 'Editar Empresas',
        ]);

        DB::table('permissions')->insert([
            'nome' => 'Empresa_Deletar',
            'descricao' => 'Deletar Empresas',
        ]);
 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        
        DB::table('permissions')->where('nome', 'like', 'Empresa%')->delete();
        
        Schema::dropIfExists('empresas');
    }

}
