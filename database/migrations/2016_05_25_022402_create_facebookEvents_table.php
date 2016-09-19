<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacebookEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facebookEvents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('facebook_id');
            $table->string('name');
            $table->string('description');
            $table->string('category');
            $table->string('street_address')->nullable();
            $table->string('date_start');
            $table->string('date_end')->nullable();
            $table->integer('feature_event')->default(0);
            $table->string('unique_id');
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
        Schema::drop('facebookEvents');
    }
}
