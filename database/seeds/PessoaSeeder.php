<?php

use Illuminate\Database\Seeder;

class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
      {
            factory('App\Cadastro\PessoaGrupo',3)->create();

            factory(App\Cadastro\Pessoa::class, 10)->create()
                ->each(
                    function ($u){$u->enderecos()->save(factory(App\Cadastro\PessoaEndereco::class)->make());



            });

   factory(App\Cadastro\Pessoa::class, 10)->create()
                ->each(
                    function ($u){$u->contatos()->save(factory(App\Cadastro\PessoaContato::class)->make());



            });
    }
}