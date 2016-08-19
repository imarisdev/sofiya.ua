<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedialibTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medialib', function (Blueprint $table) {
            $table->increments('id');
            $table->string('object_type', 15)->index();
            $table->integer('object_id')->index();
            $table->smallInteger('order')->default(1);
            $table->string('file', 250);
            $table->string('title', 250)->nullable();
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
        Schema::drop('medialib');
    }
}
