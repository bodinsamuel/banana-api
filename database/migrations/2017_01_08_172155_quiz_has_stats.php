<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuizHasStats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_has_stats', function (Blueprint $table) {
            $table->increments('quiz_has_stats_id');
            $table->unsignedInteger('quiz_id');
            $table->unsignedInteger('participations');
            $table->unsignedInteger('views');
            $table->unsignedInteger('likes');
            $table->unsignedInteger('shares');
            $table->unsignedInteger('comments');
            $table->dateTime('date_updated');
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
