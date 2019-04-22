<?php

use Faker\Generator as Faker;

$factory->define(\App\TaSidang::class, function (Faker $faker) {

    $sidang_at = \Carbon\Carbon::now();
    $semhas = factory(\App\TaSemhas::class)->create([
        'semhas_at' => $sidang_at->subMonth()->toDateString(),
        'semhas_time' => $sidang_at->subMonth()->toTimeString()
    ]);

    return [
        'ta_semhas_id' => $semhas->id,
        'sidang_at' => $sidang_at->toDateString(),
        'sidang_time' => $sidang_at->toTimeString(),
        'ruangan_id' => $faker->randomElement(\App\Ruangan::all()->pluck('id')->toArray()),
        'status' => 1,
        'nilai_angka' => rand(45, 100),
        'nilai_huruf' => array_rand(['C', 'C+', 'B-', 'B', 'B+', 'A-', 'A']),
        'nilai_toefl' => rand(300, 900),
        'nilai_akhir_ta' => array_rand(['C', 'C+', 'B-', 'B', 'B+', 'A-', 'A'])
    ];
});
