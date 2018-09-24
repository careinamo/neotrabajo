<?php

use Faker\Generator as Faker;

$factory->define(App\Empresa::class, function (Faker $faker) {
    return [
        'nombre_comercial' => $faker->sentence(4, true),
        'denominacion_social' => $faker->sentence(4, true),
        'nif_cif' => $faker->ein,
        'persona_contacto' => $faker->name,
        'cargo_en_empresa' => $faker->sentence(2, true),
        'telefonos' => $faker->phoneNumber,
        'correo_electrónico' => $faker->safeEmail,
        'empresa_aprobada' => $faker->boolean,
    ];
});
