<?php

use Faker\Generator as Faker;

$factory->define(\App\TaPembimbing::class, function (Faker $faker) {

    $tugas_akhir = factory(\App\TugasAkhir::class)->create();
    $dosen = factory(\App\Dosen::class)->create();

    return [
        'dosen_id' => $dosen->id,
        'tugas_akhir_id' => $tugas_akhir->id,
        'jabatan' => $faker->randomElement([1, 2]),
        'status' => 1,
    ];
});
