<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->text('description_plain');
            $table->integer('feature_event')->default(0);
            $table->string('address_street_1');
            $table->string('address_street_2')->nullable();
            $table->string('city', 40);
            $table->string('state', 40);
            $table->string('zip',10);
            $table->string('date_start');
            $table->string('date_end');
            $table->string('website')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('eb_url')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('eventbrite_id')->nullable();
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
        Schema::drop('events');
    }
}
