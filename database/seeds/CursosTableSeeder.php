<?php

use Illuminate\Database\Seeder;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Verdade\Entities\Curso::truncate();

        factory(\Verdade\Entities\Curso::class, 4)->create();
    }
}
