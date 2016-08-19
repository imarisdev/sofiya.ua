<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('status')->default(0);
            $table->smallInteger('plans_type')->default(1)->index();
            $table->integer('house_id')->unsigned();
            $table->foreign('house_id')->references('id')->on('houses');
            $table->smallInteger('flats_count')->default(0);
            $table->string('title', 250);
            $table->string('slug', 250)->index();
            $table->string('image', 250)->nullable();
            $table->decimal('area', 5, 2)->index();
            $table->decimal('live', 5, 2)->index();
            $table->decimal('kitchen', 5, 2)->index();
            $table->decimal('bathroom_area', 5, 2)->index();
            $table->smallInteger('bathroom')->default(0)->index();
            $table->smallInteger('balcony')->default(0)->index();
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
        Schema::drop('plans');
    }
}
