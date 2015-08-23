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
            $table->interget('user_id', 11)->unsigned();
            $table->interget('media_id', 11)->unsigned();
            $table->string('type', 20);
            $table->string('title', 255)->unique();
            $table->tinyInteger('state_visibility')->nullable();
            $table->dateTime('date_created');
            $table->dateTime('date_updated');
            $table->dateTime('date_deleted')->nullable();
        });

        $table->index(['date_deleted', 'state_visibility', 'date_created']);

        $table->foreign('user_id')->references('user_id')->on('users');
        $table->foreign('media_id')->references('media_id')->on('media');
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
