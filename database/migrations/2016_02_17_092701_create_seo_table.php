<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeoTable extends Migration
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
            $table->integer('object_id')->index();
            $table->string('object_type', 50)->index();
            $table->string('title', 250);
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->string('h1', 250)->nullable();
            $table->text('content')->nullable();
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