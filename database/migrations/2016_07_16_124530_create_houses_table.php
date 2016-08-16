<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('status')->default(0);
            $table->integer('street_id')->unsigned();
            $table->foreign('street_id')->references('id')->on('streets');
            $table->string('number', 5)->index();
            $table->integer('complex_id')->unsigned();
            $table->foreign('complex_id')->references('id')->on('complex');
            $table->string('title', 250);
            $table->string('slug', 250)->index();
            $table->string('image', 250)->nullable();
            $table->text('content')->nullable();
            $table->decimal('lat', 12, 9)->nullable();
            $table->decimal('lon', 12, 9)->nullable();
            $table->smallInteger('is_rent')->default(0)->index();
            $table->smallInteger('is_installments')->default(0)->index();
            $table->smallInteger('parking')->default(0)->index();
            $table->integer('floors')->default(1)->index();
            $table->smallInteger('building_type')->nullable();
            $table->smallInteger('decoration')->default(0)->nullable();
            $table->string('transport', 250)->nullable();
            $table->string('to_stop', 250)->nullable();
            $table->dateTime('completion_at')->index();
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
        Schema::drop('houses');
    }
}
