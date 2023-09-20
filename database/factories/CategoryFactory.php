<?php

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

$factory->define(Category::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence, 
    ];
});

