<?php

use Faker\Generator as Faker;

$factory->define(App\Curso::class, function (Faker $faker) {
    return [
        'nombre' => $faker->sentence(4, true),
        'lugar_celebracion' => $faker->address,
        'fecha_inicio' => $faker->date,
        'fecha_fin' => $faker->date,
        'hora_inicio' => $faker->time,
        'hora_fin' => $faker->time,
        'duracion_horas' => $faker->randomDigit,
        'plazas_total' => 20,
        'plazas_disponibles' => $faker->randomDigit(0,20),
        'edades_recomendadas' => $faker->randomDigit,
        'pertenece_fie' => $faker->boolean,
        'contenido' => $faker->text,
    ];
});
