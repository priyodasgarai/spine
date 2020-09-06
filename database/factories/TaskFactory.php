<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\task;
use Faker\Generator as Faker;

$factory->define(task::class, function (Faker $faker) {
    return [
        'title' => $faker->company,
        'descriotion' => $faker->paragraph(20),
        'user_id'=>1
    ];
});
