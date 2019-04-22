<?php

use Faker\Generator as Faker;

$factory->define(\App\RefSkemaPengabdian::class, function (Faker $faker) {
    return [
        'kode' => $faker->numerify('PENG##'),
        'nama' => $faker->domainName,
    ];
});
