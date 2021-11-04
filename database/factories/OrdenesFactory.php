<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\V1\Orden;
use Faker\Generator as Faker;

$factory->define(Orden::class, function (Faker $faker) {
    return [
        'folio'=> $faker->randomNumber(7,true),
        'tipo_id'=> $faker->numberBetween(1, 4),
        'direccion' => $faker->address(),
        'zona_id' => $faker->numberBetween(1, 4),
        'archivo' => $faker->name(),
        'estado_actual' => $faker->numberBetween(0, 3),
        'fecha' => $faker->date(),
        'inspector_id' => $faker->numberBetween(1, 25),
        'dependencia_id' => $faker->numberBetween(1, 10),
        'user_created'=>1,
        'user_updated'=>1
    ];
});
