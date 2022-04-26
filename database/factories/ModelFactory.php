<?php

$factory->define(App\Models\Cidade::class, function (Faker\Generator $faker) {
    return [
        'ibge' => $faker->randomNumber(8),
        'nome' => $faker->city,
    ];
});
