<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\BlogPost::class, function (Faker $faker) {
    $title = $faker->sentence(rand(3, 8), true);
    $text = $faker->realText(rand(1000, 4000));
    $isPublished = rand(1,2) > 1;

    $data = [
        'category_id' => rand(1, 10),
        'user_id' => rand(1, 5) == 5 ? 2 : 1,
        'slug' => \Illuminate\Support\Str::slug($title),
        'title' => $title,
        'text' => $text,
    ];

    return $data;
});
