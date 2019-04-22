<?php

use Faker\Generator as Faker;

$factory->define(\App\TaPesertaSemhas::class, function (Faker $faker) {

    $semhas = factory(\App\TaSemhas::class)->create();
    $mahasiswa = factory(\App\Mahasiswa::class)->create();

    return [
        'ta_semhas_id' => $semhas->id,
        'mahasiswa_id' => $mahasiswa->id
    ];
});
