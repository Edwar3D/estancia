<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'fundamento_id'=>$faker->random_int(1,10),
        'inspector_id'=>$faker->random_int(1,30),
    ];
});
