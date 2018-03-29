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
            factory('App\Model\Cadastro\PessoaGrupo',3)->create();

            factory(App\Model\Cadastro\Pessoa::class, 10)->create()
                ->each(
                    function ($u){$u->enderecos()->save(factory(App\Model\Cadastro\PessoaEndereco::class)->make());



            });

   factory(App\Model\Cadastro\Pessoa::class, 10)->create()
                ->each(
                    function ($u){$u->contatos()->save(factory(App\Model\Cadastro\PessoaContato::class)->make());



            });

        
//                    function ($u){$u->contatos()->save(factory(App\Model\Cadastro\PessoaContato::class)->make());}




/*            factory('App\Cliente',10)->create()->each(function($u){
            $u->telefones()->save(factory('App\Telefone')->make());
        });
*/


        }

}
