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
        DB::statement('set foreign_key_checks=0');

        $this->call(CursosTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(DisciplinasTableSeeder::class);
        $this->call(AlunoDisciplinasTableSeeder::class);

        DB::statement('set foreign_key_checks=1');
    }
}
