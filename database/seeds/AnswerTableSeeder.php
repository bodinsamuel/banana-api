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
        $quiz->title = 'La mer noir';
        $quiz->is_right = 1;
        $quiz->save();
        $quiz = new Answer();
        $quiz->question_id = 1;
        $quiz->user_id = 1;
        $quiz->title = 'Obiwan Kenobi';
        $quiz->is_right = 0;
        $quiz->save();
        $quiz = new Answer();
        $quiz->question_id = 1;
        $quiz->user_id = 1;
        $quiz->title = 'La réponse D';
        $quiz->is_right = 0;
        $quiz->save();
        $quiz = new Answer();
        $quiz->question_id = 1;
        $quiz->user_id = 1;
        $quiz->title = 'La chancelière allemande';
        $quiz->is_right = 0;
        $quiz->save();

        $quiz = new Answer();
        $quiz->question_id = 2;
        $quiz->user_id = 1;
        $quiz->title = 'Le brexit';
        $quiz->is_right = 0;
        $quiz->save();
        $quiz = new Answer();
        $quiz->question_id = 2;
        $quiz->user_id = 1;
        $quiz->title = 'H&M';
        $quiz->is_right = 1;
        $quiz->save();
        $quiz = new Answer();
        $quiz->question_id = 2;
        $quiz->user_id = 1;
        $quiz->title = 'Theresa May';
        $quiz->is_right = 0;
        $quiz->save();

        $quiz = new Answer();
        $quiz->question_id = 3;
        $quiz->user_id = 1;
        $quiz->title = 'NATO';
        $quiz->is_right = 0;
        $quiz->save();
        $quiz = new Answer();
        $quiz->question_id = 3;
        $quiz->user_id = 1;
        $quiz->title = 'Merkel';
        $quiz->is_right = 1;
        $quiz->save();
        $quiz = new Answer();
        $quiz->question_id = 3;
        $quiz->user_id = 1;
        $quiz->title = 'Emmanuel Macron';
        $quiz->is_right = 1;
        $quiz->save();
        $quiz = new Answer();
        $quiz->question_id = 3;
        $quiz->user_id = 1;
        $quiz->title = 'Le changement climatique';
        $quiz->is_right = 1;
        $quiz->save();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
