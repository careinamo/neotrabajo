<?php

use Faker\Generator as Faker;

$factory->define(App\Oferta::class, function (Faker $faker) {
    return [
        'descripcion'  => $faker->sentence(6, true),
        'descripcion_larga'  => $faker->text(255),
        'numero_puestos'  => $faker->randomDigit,
        'tareas_desenvolver' => $faker->text,
        'plazo_presentación' => $faker->date,
        'tipo_contrato_id' => $faker->numberBetween(1,3),
        'fecha_incorporacion' => $faker->date,
        'duracion_contratos' => "1 año",
        'localidad' => $faker->address,
        'horario_incio' => $faker->time,
        'horario_fin' => $faker->time,
        'salario' => $faker->randomNumber(4),
        'formación_requisito' => $faker->sentence(4, true),
        'experiencia_requisito' => $faker->sentence(4, true),
        'validada' => $faker->boolean,
        'otros_requisitos' => $faker->text,
    ];
});
