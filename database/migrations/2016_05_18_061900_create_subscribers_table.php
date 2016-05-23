<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_first')->nullable();
            $table->string('name_last')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('mailchimp_status')->nullable();
            $table->integer('email_consent_volunteer')->nullable();
            $table->string('unique_id');
            $table->string('austin');
            $table->string('address_street_1');
            $table->string('address_street_2');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
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
        Schema::drop('subscribers');
    }
}
