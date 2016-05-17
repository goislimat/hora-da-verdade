<?php

use Illuminate\Database\Seeder;

class ProvasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Verdade\Entities\Prova::truncate();

        factory(\Verdade\Entities\Prova::class, 100)->create();
    }
}
