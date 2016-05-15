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

    if($hash['tipo'] == 1)
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
