<?php

use Illuminate\Database\Seeder;

class DisciplinasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Verdade\Entities\Disciplina::truncate();

        factory(\Verdade\Entities\Disciplina::class, 50)->create();
    }
}
