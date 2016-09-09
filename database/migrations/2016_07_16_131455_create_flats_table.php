<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('status')->default(0)->index();
            $table->integer('house_id')->unsigned();
            $table->foreign('house_id')->references('id')->on('houses');
            $table->integer('plan_id')->unsigned();
            $table->foreign('plan_id')->references('id')->on('plans');
            $table->integer('manager_id')->unsigned();
            $table->foreign('manager_id')->references('id')->on('users');
            $table->smallInteger('floor')->default(1)->index();
            $table->smallInteger('number')->default(1);
            $table->string('title', 250);
            $table->string('image', 250)->nullable();
            $table->text('content')->nullable();
            $table->text('comment')->nullable();
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
        Schema::drop('flats');
    }
}
