<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ingredient;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Meal;
use Illuminate\Database\Eloquent\Factories\Factory;

class JelaSvijetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Ingredient::class, 15)->create();
    
        factory(Category::class, 15)->create();
      
        factory(Tag::class, 15)->create();

        factory(Meal::class, 15)->create()->each(function ($meal) {
            $tagZaAttach = Tag::inRandomOrder()->first();
            $meal->tags()->attach($tagZaAttach->id);
            
            $ingredientZaAttach = Ingredient::inRandomOrder()->first();
            $meal->ingredients()->attach($ingredientZaAttach->id);
        });
    }
}
