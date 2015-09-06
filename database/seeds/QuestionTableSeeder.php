<?php

use Illuminate\Database\Seeder;

use App\Question;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('questions')->truncate();

        $quiz = new Question();
        $quiz->quiz_id = 1;
        $quiz->user_id = 1;
        $quiz->title = 'Seeded question 1';
        $quiz->save();
        $quiz = new Question();
        $quiz->quiz_id = 1;
        $quiz->user_id = 1;
        $quiz->title = 'Seeded question 2';
        $quiz->save();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
