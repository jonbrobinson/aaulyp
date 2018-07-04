<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('officers', function (Blueprint $table) {
            $table->increments('id');
            $table->string("first_name");
            $table->string("last_name");
            $table->string("bio");
            $table->unsignedInteger("position_id");
            $table->string("linkedin")->nullable();
            $table->string("facebook")->nullable();
            $table->string("instagram")->nullable();
            $table->string("twitter")->nullable();
            $table->string("img_profile")->nullable();
            $table->string("img_alt")->nullable();
            $table->string("img_uc_base")->nullable();
            $table->string("img_uc_meta")->nullable();
            $table->timestamps();


        });

        Schema::table('officers', function (Blueprint $table) {
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
        Schema::drop('officers');
    }
}
