<?php

use Faker\Generator as Faker;

$factory->define(App\TipoContrato::class, function (Faker $faker) {
    return [
        'descripcion' => $faker->sentence(3, true),
    ];
});
