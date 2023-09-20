<?php

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ingredient;

$factory->define(Ingredient::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word, 
    ];
});

