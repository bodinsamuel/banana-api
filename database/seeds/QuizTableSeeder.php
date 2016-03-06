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
        $quiz->title = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam posuere ut lorem vitae fermentum';
        $quiz->content = 'Praesent pellentesque leo enim, ut lobortis mauris egestas et. Quisque sit amet vehicula lectus. Proin venenatis velit ac lacinia porttitor. Mauris at quam dolor. Proin vitae turpis in ligula finibus auctor. Vivamus cursus dolor a erat eleifend, et scelerisque neque suscipit. Nulla';
        $quiz->state_visibility = 1;
        $quiz->save();

        $quiz = new Quiz();
        $quiz->user_id = 1;
        $quiz->media_id = 2;
        $quiz->type = 'classic';
        $quiz->title = 'Cras cursus tempus lectus ac finibus ?';
        $quiz->content = 'Maecenas sollicitudin, nunc in dignissim ultrices, nibh eros pharetra leo, et facilisis urna sem et erat. Vivamus eget ultricies nisi';
        $quiz->state_visibility = 1;
        $quiz->save();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
