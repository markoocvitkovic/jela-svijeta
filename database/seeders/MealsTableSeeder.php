<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Meal; 

class MealsTableSeeder extends Seeder
{
    use WithoutModelEvents;
    public function run()
    {
       
        Meal::factory()->create([
            'title' => 'Naslov jela na HRV jeziku',
            'description' => 'Opis jela na HRV jeziku',
            'status' => 'created',
        ]);

        Meal::factory()->create([
            'title' => 'Naslov jela 2 na HRV jeziku',
            'description' => 'Opis jela 2 na HRV jeziku',
            'status' => 'created',
        ]);

        Meal::factory()->create([
            'title' => 'Naslov jela 3 na HRV jeziku',
            'description' => 'Opis jela 3 na HRV jeziku',
            'status' => 'deleted',
        ]);


    }
}
