<?php

use Faker\Generator as Faker;

$factory->define(\App\RefJabatanOrganisasi::class, function (Faker $faker) {
    return [
        'jabatan' => $faker->jobTitle
    ];
});
