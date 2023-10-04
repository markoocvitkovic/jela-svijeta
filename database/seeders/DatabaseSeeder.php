<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ingredient;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Meal;


class DatabaseSeeder extends Seeder
{
   
    public function run()
    {
        $this->call(JelaSvijetaSeeder::class);
    }
}
