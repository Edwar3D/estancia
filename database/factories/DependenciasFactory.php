<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dependencia;
use Faker\Generator as Faker;

$factory->define(Dependencia::class, function (Faker $faker) {
    return [
        'dependencia'=>'depencia 1',
        'perentid'=>'parentid',
        'nivel'=>1,
    ];
});
