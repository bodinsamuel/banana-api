<?php

use Illuminate\Database\Seeder;

use App\Quiz;

class QuizTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('quizzes')->truncate();

        $quiz = new Quiz();
        $quiz->user_id = 1;
        $quiz->media_id = 1;
        $quiz->type = 'classic';
        $quiz->title = 'Seeded quiz';
        $quiz->content = 'loremipsum';
        $quiz->state_visibility = 1;
        $quiz->save();

        $quiz = new Quiz();
        $quiz->user_id = 1;
        $quiz->media_id = 2;
        $quiz->type = 'classic';
        $quiz->title = 'Seeded quiz 2';
        $quiz->content = 'loremipsum 2';
        $quiz->state_visibility = 1;
        $quiz->save();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
