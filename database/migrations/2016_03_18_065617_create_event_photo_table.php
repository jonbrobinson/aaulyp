<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventPhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_photo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')
                ->references('id')
                ->on('events');
            $table->string('path');
            $table->string('thumbnail_path');
            $table->string('name');
            $table->string('event_main');
            $table->string('dropbox_path')->nullable();
            $table->string('dropbox_thumbnail_path')->nullable();
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
        Schema::drop('event_photo');
    }
}
