<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'name' => $faker->lastName . ' ' . $faker->middleName . ' ' .$faker->firstName,
        'phone' => $faker->phoneNumber,
        'CMND' => $faker->idNumber,
        'birthday' => $faker->dateTimeThisCentury($max = 'now', $timezone = 'Asia/Ho_Chi_Minh')->format('Y-m-d'),
        'address' => $faker->address,
        'type' => 2,
        'work_unit' => 'League Dojo',
        'weight' => $faker->numberBetween(45, 75),
        'height' => $faker->numberBetween(150, 190),
        'sex' => $faker->randomElement([0, 1]),
        'link_fb' => $faker->url,
        'test_score' => $faker->numberBetween(0, 30),
    ];
});
