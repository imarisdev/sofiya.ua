<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent')->default(0)->index();
            $table->smallInteger('status')->default(0)->index();
            $table->smallInteger('is_special')->default(0)->index();
            $table->integer('commentable_id')->index();
            $table->string('commentable_type')->index();
            $table->string('name', 150)->nullable();
            $table->string('email', 150)->nullable();
            $table->text('content');
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
        Schema::dropIfExists('comments');
    }
}
