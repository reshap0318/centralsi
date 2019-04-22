<?php

use Faker\Generator as Faker;

$factory->define(\App\Mahasiswa::class, function (Faker $faker) {

    $user = factory(\App\User::class)->create();

    return [
        'id' => $user->id,
        'nim' => $user->username,
        'nama' => $faker->name,
        'angkatan' => $faker->numerify('201#'),
        'tanggal_lahir' => $faker->date(),
        'tempat_lahir' => $faker->city,
        'nohp' => $faker->phoneNumber,
    ];
});
