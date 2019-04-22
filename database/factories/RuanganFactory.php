<?php

use Faker\Generator as Faker;

$factory->define(\App\Ruangan::class, function (Faker $faker) {
    return [
        'nama' => $faker->streetName
    ];
});
