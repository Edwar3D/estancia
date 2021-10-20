<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\V1\Orden;
use Faker\Generator as Faker;

$factory->define(Orden::class, function (Faker $faker) {
    return [
        'folio'=> $faker->randomNumber(7,true),
        'tipo'=> $faker->numberBetween(0, 3),
        'direccion' => $faker->address(),
        'zona' => $faker->numberBetween(0, 3),
        'archivo' => $faker->name(),
        'estado_actual' => $faker->numberBetween(0, 3),
        'fecha' => $faker->date(),
        'inspector_id' => $faker->numberBetween(1, 25),
    ];
});
