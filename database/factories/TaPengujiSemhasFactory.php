<?php

use Faker\Generator as Faker;

$factory->define(\App\TaPengujiSemhas::class, function (Faker $faker) {

    $semhas = factory(\App\TaSemhas::class)->create();
    $dosen = factory(\App\Dosen::class)->create();

    return [
        'ta_semhas_id' => $semhas->id,
        'dosen_id' => $dosen->id,
        'bersedia' => 1
    ];
});
