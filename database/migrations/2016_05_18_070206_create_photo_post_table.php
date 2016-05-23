<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')
                ->references('id')
                ->on('events');
            $table->string('path');
            $table->string('thumbnail_path');
            $table->string('name');
            $table->string('event_main')->default(0);
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
        Schema::drop('photo_post');
    }
}
