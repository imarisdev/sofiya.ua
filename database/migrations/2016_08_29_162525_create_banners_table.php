<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('position')->default(1)->index();
            $table->smallInteger('type')->default(1)->index();
            $table->string('title', 250);
            $table->string('link', 250);
            $table->string('action', 250)->nullable();
            $table->string('file', 250);
            $table->smallInteger('sort')->default(1)->index();
            $table->string('width', 5)->default('100%');
            $table->string('height', 5)->default('100%');
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
        Schema::drop('banners');
    }
}
