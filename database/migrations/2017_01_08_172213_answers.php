<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Answers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('answer_id');
            $table->unsignedInteger('question_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('media_id')->nullable();
            $table->string('title', 255);
            $table->unsignedTinyInteger('is_right')->default(0);
            $table->unsignedTinyInteger('state_order')->default(1);
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
