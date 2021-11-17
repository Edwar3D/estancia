<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\V1\Inspector;
use Faker\Generator as Faker;

$factory->define(Inspector::class, function (Faker $faker) {
    return [
        'numero_empleado'=> $faker->randomNumber(8, true),
        'nombre'=> $faker->name(),
        'apellidos'=> $faker->name(),
        'cargo_id'=> $faker->numberBetween(1, 3),
        'jefe'=> $faker->name(),
        'telefono'=>9671234545,
        'email'=> $faker->email(),
        'estado_actual'=> 1,
        'foto'=> 'null',
        'area_administrativa'=>null,
        'dependencia_id'=> $faker->randomDigitNot(0),
        'user_created'=>1,
        'user_updated'=>1
    ];
});
