<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAllForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('media', function (Blueprint $table) {
            $table->index('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->index('media_id');
            $table->unique('login');
            $table->unique('email');
            $table->foreign('media_id')->references('media_id')->on('media');
        });
        Schema::table('quiz_has_stats', function (Blueprint $table) {
            $table->index('quiz_id');
            $table->foreign('quiz_id')->references('quiz_id')->on('quizzes');
        });
        Schema::table('quizzes', function (Blueprint $table) {
            $table->index('user_id');
            $table->index('media_id');
            $table->foreign('media_id')->references('media_id')->on('media');
            $table->foreign('user_id')->references('user_id')->on('users');
        });
        Schema::table('questions', function (Blueprint $table) {
            $table->index('user_id');
            $table->index('media_id');
            $table->index('quiz_id');
            $table->foreign('media_id')->references('media_id')->on('media');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('quiz_id')->references('quiz_id')->on('quizzes');
        });
        Schema::table('answers', function (Blueprint $table) {
            $table->index('user_id');
            $table->index('media_id');
            $table->index('question_id');
            $table->foreign('media_id')->references('media_id')->on('media');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('question_id')->references('question_id')->on('questions');
        });
        Schema::table('results', function (Blueprint $table) {
            $table->index('user_id');
            $table->index('media_id');
            $table->index('quiz_id');
            $table->foreign('media_id')->references('media_id')->on('media');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('quiz_id')->references('quiz_id')->on('quizzes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
