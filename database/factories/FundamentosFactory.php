<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\V1\FundamentoJuridico;
use Faker\Generator as Faker;

$factory->define(FundamentoJuridico::class, function (Faker $faker) {
    return [
        'fundamento'=>$faker->text(200),
    ];
});
