<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Posts;
use Faker\Generator as Faker;

$factory->define(Posts::class, function (Faker $faker) {
    return [
        'cat_id' => 1,
        'author_id' => factory(\App\User::class),
        'title' => str_replace('.', '', $faker->sentence),
        'body' => "<p>{$faker->text(2000)}</p>"
    ];
});