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
        $res->title = 'Top , more of 3';
        $res->content = '';
        $res->moreof = '3';
        $res->save();
        $res = new Result();
        $res->quiz_id = 1;
        $res->title = 'Good, more of 2';
        $res->content = 'lorem ipsum';
        $res->moreof = '2';
        $res->save();
        $res = new Result();
        $res->quiz_id = 1;
        $res->title = 'Meh, more of 1';
        $res->content = 'lorem ipsum';
        $res->moreof = '1';
        $res->save();
        $res = new Result();
        $res->quiz_id = 1;
        $res->title = 'Bad !, more of 0';
        $res->content = 'lorem ipsum';
        $res->moreof = '0';
        $res->save();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
