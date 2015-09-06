<?php

use Illuminate\Database\Seeder;

use App\Result;

class ResultTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('results')->truncate();

        $res = new Result();
        $res->quiz_id = 1;
        $res->type = 1;
        $res->title = 'Seeded result';
        $res->content = 'lorem ipsum';
        $res->save();
        $res = new Result();
        $res->quiz_id = 1;
        $res->type = 2;
        $res->title = 'Seeded result';
        $res->content = 'lorem ipsum';
        $res->save();
        $res = new Result();
        $res->quiz_id = 1;
        $res->type = 3;
        $res->title = 'Seeded result';
        $res->content = 'lorem ipsum';
        $res->save();
        $res = new Result();
        $res->quiz_id = 1;
        $res->type = 4;
        $res->title = 'Seeded result';
        $res->content = 'lorem ipsum';
        $res->save();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
