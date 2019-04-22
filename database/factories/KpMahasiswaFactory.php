<?php

use Faker\Generator as Faker;

$factory->define(\App\KpMahasiswa::class, function (Faker $faker) {

    $proposal = factory(\App\KpProposal::class)->create();
    $mahasiswa = factory(\App\Mahasiswa::class)->create();
    $dosen = factory(\App\Dosen::class)->create();
    $mulai_at = \Carbon\Carbon::now();
    $ruangan = factory(\App\Ruangan::class)->create();

    return [
        'kp_proposal_id' => $proposal->id,
        'mahasiswa_id' => $mahasiswa->id,
        'bidang_usulan' => $faker->text,
        'status_kp' => 1,
        'mulai_at' => $mulai_at,
        'selesai_at' => $mulai_at->addMonth(),
        'pembimbing_id' => $dosen->id,
        'judul_laporan' => $faker->sentence,
        'seminar_deadline_at' => $mulai_at->addMonths(3)->toDateString(),
        'seminar_at' => $mulai_at->addMonths(2)->toDateString(),
        'seminar_time' => $mulai_at->addMonths(2)->toTimeString(),
        'ruangan_id' => $ruangan->id,
        'nilai_huruf' => $faker->randomElement(['A', 'A-', 'B+', 'B', 'B-', 'C+', 'C'])
    ];
});
