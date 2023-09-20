<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Tag extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'slug'];

    public function meals()
    {
        return $this->belongsToMany(Meal::class);
    }
}