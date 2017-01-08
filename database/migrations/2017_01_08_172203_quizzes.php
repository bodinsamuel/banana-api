<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Quizzes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->increments('quiz_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('media_id')->nullable();
            $table->string('type', 20)->default('classic');
            $table->string('title', 255);
            $table->text('content');
            $table->unsignedTinyInteger('state_visibility')->nullable()->default('0');
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
