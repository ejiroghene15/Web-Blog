<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ForumMessages;
use App\ForumTopics;
use Faker\Generator as Faker;

$factory->define(ForumMessages::class, function (Faker $faker) {
    return [
        "subject" => ForumTopics::find(1)->subject,
        "topic_id" => ForumTopics::find(1)->id,
        "user_id" => 1,
        "body" => $faker->paragraph,
        "date" => now()
    ];
});
