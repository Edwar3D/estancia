<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\V1\Dependencia;
use Faker\Generator as Faker;

$factory->define(Dependencia::class, function (Faker $faker) {
    return [
        'dependencia'=>$faker->word(),
        'responsable'=>$faker->name(),
        'direccion'=>$faker->address(),
        'telefono'=>$faker->phoneNumber(),
        'ext'=>$faker->buildingNumber(),
        'email'=>$faker->email(),
        'subdependencia'=>0,
        'parent_id'=>null,
        'nivel'=>$faker->randomDigitNot(0),
        'user_created'=>1,
        'user_updated'=>1
    ];
});
