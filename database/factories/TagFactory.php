<?php

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'title' => $faker->text(50),
        'slug' => $faker->slug(8),
    ];
});

