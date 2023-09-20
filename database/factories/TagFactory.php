<?php

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tag;

$factory->define(Tag::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word, 
    ];
});
