<?php

use Faker\Generator as Faker;

$factory->define(App\RefJenjangPendidikan::class, function (Faker $faker) {
    return [
        'tingkat' => $faker->name
    ];
});
