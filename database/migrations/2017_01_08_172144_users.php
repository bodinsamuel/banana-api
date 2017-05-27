<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->unsignedInteger('media_id')->nullable();
            $table->string('login', 25);
            $table->string('password', 155);
            $table->string('first_name', 75);
            $table->string('last_name', 125);
            $table->string('email', 255);
            $table->dateTime('date_created');
            $table->dateTime('date_updated');
            $table->dateTime('date_deleted')->nullable();
            $table->dateTime('date_validated_email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
