<?php

use Faker\Generator as Faker;

$factory->define(\App\TugasAkhir::class, function (Faker $faker) {

    $mahasiswa = factory(\App\Mahasiswa::class)->create();

    $datetime = \Carbon\Carbon::now();

    return [
        'mahasiswa_id' => $mahasiswa->id,
        'konsentrasi_id' => $faker->randomElement(\App\RefKonsentrasiTa::all()->pluck('id')->toArray()),
        'judul' => $faker->sentence,
        'status_ta'=>1,
        'sinopsis' => $faker->sentence(5, true),
        'registered_at' => $datetime->toDateTimeString(),
        'proposal_deadline_at' => $datetime->addMonth(),
    ];
});
