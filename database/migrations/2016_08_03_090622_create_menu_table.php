<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('status')->default(0);
            $table->smallInteger('sort')->default(0);
            $table->integer('parent')->default(0);
            $table->string('position', 15)->default('top')->index();
            $table->string('title', 50);
            $table->string('slug', 250)->index();
            $table->string('path', 250)->nullable()->index();
            $table->string('icon', 250)->nullable();
            $table->smallInteger('external')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menu');
    }
}
