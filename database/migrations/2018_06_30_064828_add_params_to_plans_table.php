<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddParamsToPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->smallInteger('is_studio')->default(0)->index();
            $table->smallInteger('is_smart')->default(0)->index();
            $table->smallInteger('is_elit')->default(0)->index();
            $table->smallInteger('is_credit')->default(0)->index();
            $table->integer('price_range')->default(0)->index();
            $table->integer('installment_plan')->default(0)->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('is_studio');
            $table->dropColumn('is_smart');
            $table->dropColumn('is_elit');
            $table->dropColumn('is_credit');
            $table->dropColumn('price_range');
            $table->dropColumn('installment_plan');
        });
    }
}
