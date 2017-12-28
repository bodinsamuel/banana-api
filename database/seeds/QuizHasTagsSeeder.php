<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\Quiz;

class QuizHasTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->truncate();
        DB::table('quiz_has_tags')->truncate();

        $tag1 = new Tag();
        $tag1->title = 'Séries';
        $tag1->url = 'series';
        $tag1->save();

        $tag2 = new Tag();
        $tag2->title = 'Cinéma';
        $tag2->url = 'cinema';
        $tag2->save();

        $quiz = Quiz::find(1);
        $quiz->tags()->attach($tag1);
        $quiz = Quiz::find(2);
        $quiz->tags()->attach($tag2);
    }
}
