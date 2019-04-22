<?php

use Faker\Generator as Faker;

$factory->define(\App\TaSempro::class, function (Faker $faker) {

    $datetime = \Carbon\Carbon::now();
    $ta = factory(\App\TugasAkhir::class)->create([
        'registered_at' => $datetime->subMonth()
    ]);

    return [
        'tugas_akhir_id' => $ta->id,
        'sempro_at' => $datetime->toDateString(),
        'sempro_time' => $datetime->toTimeString(),
        'ruangan_id' => $faker->randomElement(\App\Ruangan::all()->pluck('id')->toArray()),
        'proposal_status' => 1,
        'nilai_huruf' => 'A',
        'semhas_deadline_at' => $datetime->addMonths(2),
        'file_proposal' => "",
    ];
});
