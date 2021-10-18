<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\V1\Dependencia;
use Faker\Generator as Faker;

$factory->define(Dependencia::class, function (Faker $faker) {
    return [
        'dependencia'=>$faker->word(),
        'parentid'=>'parentid',
        'nivel'=>$faker->randomDigitNot(0),
        'responsable'=>$faker->name(),
        'unidad_administrativa'=>$faker->randomElement(['unidad A','unidad C','unidad C']),
        'direccion'=>$faker->address(),
        'email'=>$faker->email(),
        'telefono'=>$faker->phoneNumber(),
    ];
});
