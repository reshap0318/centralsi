<?php

use Faker\Generator as Faker;

$factory->define(\App\TaSemhas::class, function (Faker $faker) {

    $semhas_at = \Carbon\Carbon::now();

    $sempro = factory(\App\TaSempro::class)->create([
        'sempro_at' => $semhas_at->subMonth()->toDateString(),
        'sempro_time' => $semhas_at->subMonth()->toTimeString()
    ]);

    return [
        'ta_sempro_id' => $sempro->id,
        'semhas_at' => $semhas_at->toDateString(),
        'semhas_time' => $semhas_at->toTimeString(),
        'ruangan_id' => $faker->randomElement(\App\Ruangan::all()->pluck('id')->toArray()),
        'status' => 1,
        'rekomendasi' => rand(1, 3),
        'sidang_deadline_at' => $semhas_at->addMonth(),
        'file_ba_seminar' => null,
        'file_laporan_ta' => null,
    ];
});
