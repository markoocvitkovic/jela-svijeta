<?php

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Meal;

$factory->define(Meal::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->text(50),
        'description' => $faker->text(200),
        'status' => $faker->randomElement(['created', 'deleted']), 
    ];
});