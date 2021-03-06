<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complex', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('status')->default(0);
            $table->integer('owner')->unsigned();
            $table->foreign('owner')->references('id')->on('users');
            $table->string('title', 250);
            $table->string('slug', 250)->index();
            $table->string('image_big', 250)->nullable();
            $table->string('image_small', 250)->nullable();
            $table->string('background', 250)->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('complex');
    }
}
