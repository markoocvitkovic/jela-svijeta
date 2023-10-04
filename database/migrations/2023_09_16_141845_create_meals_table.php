<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsTable extends Migration
{
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('naziv');
            $table->string('opis');
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('meals');
    }
}
