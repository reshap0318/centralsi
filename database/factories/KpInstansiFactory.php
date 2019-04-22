<?php

use Faker\Generator as Faker;

$factory->define(\App\KpInstansi::class, function (Faker $faker) {
    return [
        'nama' => $faker->company,
        'lokasi' => $faker->city,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude
    ];
});
