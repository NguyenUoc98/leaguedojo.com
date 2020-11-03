<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Slide;
use Faker\Generator as Faker;

$factory->define(Slide::class, function (Faker $faker) {
    return [
        'image' => $faker->image('public\storage\slides\December2019', 1000, 400, null, false, true, 'slides//December2019'),
        'name' => $faker->sentence
    ];
});
