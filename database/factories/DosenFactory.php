<?php

use Faker\Generator as Faker;

$factory->define(\App\Dosen::class, function (Faker $faker) {

    $user = factory(\App\User::class)->create();

    return [
        'id' => $user->id,
        'nip' => $user->username,
        'nik' => $faker->numerify('#############'),
        'nama' => $faker->name,
        'nidn' => $faker->numerify('##########'),
        'tanggal_lahir' => $faker->date(),
        'tempat_lahir' => $faker->city,
        'nohp' => $faker->phoneNumber,
    ];
});
