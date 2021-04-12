<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\testdemo;
use Faker\Generator as Faker;

$factory->define(testdemo::class, function (Faker $faker) {
    return [
        //
      'name' => $faker->firstName(),
      'HP'=> $faker->numberBetween(10,100),
      'type'=> $faker->randomElement(['fire','water','grass','electric']),

    ];
});
