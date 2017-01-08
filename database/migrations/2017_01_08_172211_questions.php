<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Questions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('question_id');
            $table->unsignedInteger('quiz_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('media_id')->nullable();
            $table->string('title', 255);
            $table->unsignedTinyInteger('state_order')->default('1');
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
