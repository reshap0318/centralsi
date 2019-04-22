<?php

use Faker\Generator as Faker;

$factory->define(\App\KpProposal::class, function (Faker $faker) {

    $mulai_kp = \Carbon\Carbon::now();

    return [
        'judul' => $faker->sentence,
        'instansi_id' => factory(\App\KpInstansi::class)->create()->id,
        'latar_belakang' => $faker->paragraphs(3, true),
        'tujuan' => $faker->paragraph,
        'usulan_mulai_at' => $mulai_kp->toDateString(),
        'usulan_selesai_at' => $mulai_kp->addMonths(2)->toDateString(),
        'status_proposal' => 1,
        'catatan' => $faker->sentences(2, true)
    ];
});
