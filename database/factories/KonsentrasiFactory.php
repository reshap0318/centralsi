<?php

use Faker\Generator as Faker;

$factory->define(\App\RefKonsentrasiTa::class, function (Faker $faker) {
    return [
        'keterangan' => $faker->name
    ];
});
