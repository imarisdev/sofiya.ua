<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeoTabl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url', 250)->unique();
            $table->string('category')->default('Default');
            $table->string('title', 250);
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->string('h1', 250)->nullable();
            $table->text('content')->nullable();
            $table->string('lang', 2)->default('ua');
            $table->smallInteger('priority')->default(100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('seo');
    }
}