<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleAndDescriptionToMeals extends Migration
{
    public function up()
    {
        Schema::table('meals', function (Blueprint $table) {
            $table->json('title')->nullable();
            $table->json('description')->nullable();
        });
    }

    public function down()
    {
        Schema::table('meals', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('description');
        });
    }
};


