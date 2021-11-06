<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Video;
use Faker\Generator as Generator;

$factory->define(Video::class, function (Generator $faker) {
    $faker->addProvider(new Faker\Provider\Youtube($faker));
    return [
        'link' => $faker->youtubeUri(),
        'meta_keywords' => $faker->words(3, true),
        'status' => $faker->randomElement(['PUBLISHED', 'DRAFT', 'PENDING']),
        'featured' => $faker->randomElement([0,1]),
        'slug' => $faker->slug,
    ];
});
