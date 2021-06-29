<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ForumTopics;
use Faker\Generator as Faker;

$factory->define(ForumTopics::class, function (Faker $faker) {
    return [
        "forum_id" => 1,
        "user_id" => 1,
        "subject" => $faker->sentence,
        "date" => $faker->date(now())
    ];
});
