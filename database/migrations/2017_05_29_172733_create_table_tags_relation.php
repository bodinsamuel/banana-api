<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTagsRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_has_tags', function (Blueprint $table) {
            $table->unsignedInteger('tag_id');
            $table->unsignedInteger('quiz_id');
            $table->unsignedTinyInteger('is_main')->nullable();
            $table->dateTime('date_created');
            $table->dateTime('date_updated');
            $table->dateTime('date_deleted')->nullable();

            $table->unique(['quiz_id', 'is_main']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quiz_has_tags');
    }
}
