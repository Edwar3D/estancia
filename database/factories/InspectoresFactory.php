<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\V1\Inspector;
use Faker\Generator as Faker;

$factory->define(Inspector::class, function (Faker $faker) {
    return [
        'numero_empleado'=> $faker->randomNumber(8, true),
        'nombre'=> $faker->name(),
        'cargo'=> $faker->numberBetween(0, 2),
        'jefe'=> $faker->name(),
        'telefono'=> $faker->phoneNumber(),
        'email'=> $faker->email(),
        'foto'=> 'null',
        'area_administrativa'=>$faker->randomElement(['unidad A','unidad C','unidad C']),
        'fundamentos_juridicos'=>$faker->text(),
        'origen_inspeccion'=>$faker->text(),
        'dependencia_id'=> $faker->randomDigitNot(0),
    ];
});
