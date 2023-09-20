<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag; 

class TagsTableSeeder extends Seeder
{
    public function run()
    {        
        Tag::factory()->create([
            'title' => 'Naslov taga 1 na HRV jeziku',
        ]);

        Tag::factory()->create([
            'title' => 'Naslov taga 2 na HRV jeziku',
        ]);
        
    }
}