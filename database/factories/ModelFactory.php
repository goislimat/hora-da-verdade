<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Verdade\Entities\User::class, function (Faker\Generator $faker) {
    $hash = [
        'nome' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'tipo' => $faker->numberBetween(1, 3),
    ];

    if($hash['tipo'] == 3)
    {
        $hash['curso_id'] = Verdade\Entities\Curso::all()->random()->id;
    }

    return $hash;
});


$factory->define(Verdade\Entities\Curso::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->company,
        'tipo' => $faker->numberBetween(1, 4),
    ];
});

$factory->define(Verdade\Entities\Disciplina::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->words(4, true),
        'semestre' => $faker->numberBetween(1, 10),
        'curso_id' => \Verdade\Entities\Curso::all()->random()->id,
    ];
});

$factory->define(Verdade\Entities\Prova::class, function (Faker\Generator $faker) {
    return [
        'disciplina_id' => \Verdade\Entities\Disciplina::all()->random()->id,
        'titulo' => $faker->word(2, true),
        'data' => $faker->date('Y-m-d', '+2 months'),
        'hora_inicio' => $faker->time(),
        'hora_final' => $faker->time(),
        'pontuacao' => $faker->numberBetween(1, 30),
        'notificar' => $faker->boolean(75),
    ];
});
