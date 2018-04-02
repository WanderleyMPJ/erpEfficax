<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(AddUserSeeder::class);
        $this->call(PessoaSeeder::class);
  //      $this->call(PermissionsSeeder::class);
    }
}
