<?php

use Faker\Generator as Faker;

$factory->define(\App\RefSkemaPenelitian::class, function (Faker $faker) {
    return [
        'kode' => $faker->numerify('PNLT##'),
        'nama' => $faker->domainName,
    ];
});
