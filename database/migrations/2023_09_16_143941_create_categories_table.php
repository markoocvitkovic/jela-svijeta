<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jela_id')->unsigned()->nullable();
            $table->foreign('jela_id')->references('id')->on('meals')->onDelete('cascade');
            $table->string('naziv');
            $table->string('slug');
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
