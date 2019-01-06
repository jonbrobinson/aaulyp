<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficerPositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('officer_position', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('officer_id');
            $table->unsignedInteger('position_id');
            $table->tinyInteger('active')->default(0);
            $table->timestamps();
        });

        Schema::table('officer_position', function (Blueprint $table) {
            $table->foreign('officer_id')->references('id')->on('officers')->onUpdate('cascade');
            $table->foreign('position_id')->references('id')->on('positions')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('officer_position');
    }
}
