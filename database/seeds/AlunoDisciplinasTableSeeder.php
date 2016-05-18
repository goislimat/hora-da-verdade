<?php

use Illuminate\Database\Seeder;
use DB;

class AlunoDisciplinasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aluno_disciplinas')->truncate();

        for($i = 0; $i < 100; $i++)
        {
            while(true)
            {
                $usuario = \Verdade\Entities\User::all()->random();
                if($usuario->tipo != 1)
                {
                    break;
                }
            }

            while(true)
            {
                $disciplina = \Verdade\Entities\Disciplina::all()->random();
                if($disciplina->curso_id == $usuario->curso_id || $usuario->tipo == 2)
                {
                    break;
                }
            }

            $usuario->disciplinas()->attach($disciplina->id, ['periodo' => rand(2015, 2016) . '/' . rand(1, 2)]);
        }
    }
}
