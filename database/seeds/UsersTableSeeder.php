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
        \Verdade\Entities\User::truncate();

        \Verdade\Entities\User::create([
            'nome' => 'Thiago Gois Lima',
            'email' => 'thiagogois@iftm.edu.br',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
            'tipo' => 1,
        ]);

        \Verdade\Entities\User::create([
            'nome' => 'Professor',
            'email' => 'professor@email.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
            'tipo' => 2,
        ]);

        \Verdade\Entities\User::create([
            'nome' => 'Aluno',
            'email' => 'aluno@email.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
            'tipo' => 3,
        ]);

        factory(\Verdade\Entities\User::class, 500)->create();
    }
}
