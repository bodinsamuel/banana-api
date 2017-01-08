<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Media extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('media_id');
            $table->unsignedInteger('user_id');
            $table->string('type', 45)->default('image');
            $table->string('mime', 45);
            $table->unsignedSmallInteger('width');
            $table->unsignedSmallInteger('height');
            $table->string('hash', 35);
            $table->dateTime('date_created');
            $table->dateTime('date_updated');
            $table->dateTime('date_deleted')->nullable();
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
