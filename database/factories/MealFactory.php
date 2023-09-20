<?php

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Meal;

$factory->define(Meal::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence, 
        'description' => $faker->paragraph, 
        'status' => $faker->randomElement(['created', 'deleted']), 
    ];
});

