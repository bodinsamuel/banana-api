<?php

use Illuminate\Database\Seeder;

use App\Answer;

class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('answers')->truncate();

        $quiz = new Answer();
        $quiz->question_id = 1;
        $quiz->user_id = 1;
        $quiz->title = 'Seeded answer 1.1';
        $quiz->is_right = 1;
        $quiz->save();
        $quiz = new Answer();
        $quiz->question_id = 1;
        $quiz->user_id = 1;
        $quiz->title = 'Seeded answer 1.2';
        $quiz->is_right = 0;
        $quiz->save();

        $quiz = new Answer();
        $quiz->question_id = 2;
        $quiz->user_id = 1;
        $quiz->title = 'Seeded answer 2.1';
        $quiz->is_right = 0;
        $quiz->save();
        $quiz = new Answer();
        $quiz->question_id = 2;
        $quiz->user_id = 1;
        $quiz->title = 'Seeded answer 2.2';
        $quiz->is_right = 1;
        $quiz->save();

        $quiz = new Answer();
        $quiz->question_id = 3;
        $quiz->user_id = 1;
        $quiz->title = 'Seeded answer 3.1';
        $quiz->is_right = 0;
        $quiz->save();
        $quiz = new Answer();
        $quiz->question_id = 3;
        $quiz->user_id = 1;
        $quiz->title = 'Seeded answer 3.2';
        $quiz->is_right = 1;
        $quiz->save();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
