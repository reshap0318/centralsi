<?php

use Faker\Generator as Faker;

$factory->define(\App\TaPengujiSidang::class, function (Faker $faker) {

    $sidang = factory(\App\TaSidang::class)->create();
    $dosen = factory(\App\Dosen::class)->create();

    return [
        'ta_sidang_id' => $sidang->id,
        'dosen_id' => $dosen->id,
        'bersedia' => 1,
        'jabatan' => $faker->randomElement([1, 2]),
    ];
});
