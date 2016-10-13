<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Cria o primeiro usuário para desenvolvimento e
         * testes.
         */
        App\User::create(
            [
                'administrator' => true,
                'name' => 'Rafael Henrique Berro',
                'email' => 'rhberro@gmail.com',
                'password' => bcrypt('123123'),
                'remember_token' => str_random(10),
            ]
        );

        factory(App\User::class, 100)->create();
    }
}
