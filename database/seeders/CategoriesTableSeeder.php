<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {       
        Category::factory()->create([
            'title' => 'Naslov kategorije 2 na HRV jeziku',
        ]);

        Category::factory()->create([
            'title' => 'Naslov kategorije 1 na HRV jeziku',
        ]);
    }
}
