<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ingredient;

class IngredientsTableSeeder extends Seeder
{
    public function run()
    {
        
        Ingredient::factory()->create([
            'title' => 'Naslov sastojka 58',
        ]);

        Ingredient::factory()->create([
            'title' => 'Naslov sastojka 43',
        ]);
          
        Meal::find(1)->ingredients()->attach([58, 43]);
        Meal::find(2)->ingredients()->attach([43]);
     
    }
}
