<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_first')->nullable();
            $table->string('name_last')->nullable();
            $table->index('email');
            $table->string('phone')->nullable();
            $table->string('mailchimp_status')->nullable();
            $table->integer('email_consent_volunteer')->nullable();
            $table->string('unique_id');
            $table->string('address_street_1')->nullable();
            $table->string('address_street_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->integer('active_status');
            $table->eventbrite('order_purchase_date');
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
        Schema::drop('members');
    }
}
