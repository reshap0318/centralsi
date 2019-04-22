<?php

use Faker\Generator as Faker;

$factory->define(\App\KpPeserta::class, function (Faker $faker) {

    $kp = factory(\App\KpMahasiswa::class)->create();
    $mahasiswa = factory(\App\Mahasiswa::class)->create();

    return [
       'kp_mahasiswa_id' => $kp->id,
       'mahasiswa_id' => $mahasiswa->id
    ];
});
