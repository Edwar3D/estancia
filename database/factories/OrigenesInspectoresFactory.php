<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'origen_id'=>$faker->numberBetween(0,10),
        'inspector_id'=>$faker->numberBetween(0,30),
    ];
});
