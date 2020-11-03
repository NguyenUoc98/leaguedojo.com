<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'author_id' => 1,
        'category_id' => 3,
        'title' => $faker->sentence,
        'excerpt' => $faker->paragraph,
        'body' => $faker->paragraphs(3, true),
        'image' => '["' . $faker->image('public\storage\posts\December2019', 400, 300, null, false, true, 'posts//December2019') . '"]',
        'slug' => $faker->slug,
        'source' => 'Karte League Dojo',
        'meta_keywords' => $faker->words(3, true),
        'status' => $faker->randomElement(['PUBLISHED', 'DRAFT', 'PENDING']),
        'featured' => $faker->randomElement([0,1]),
    ];
});
