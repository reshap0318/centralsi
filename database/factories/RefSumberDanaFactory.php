<?php

use Faker\Generator as Faker;

$factory->define(\App\RefSumberDana::class, function (Faker $faker) {
    return [
        'kode' => $faker->numerify('SB##'),
        'nama' => $faker->domainName,
    ];
});
