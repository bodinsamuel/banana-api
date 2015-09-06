<?php

use Illuminate\Database\Seeder;

use App\Media;

class MediaTableSeeder extends Seeder
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

        $media = new Media();
        $media->user_id = 1;
        $media->type = 'image';
        $media->mime = 'image/jpeg';
        $media->width = '1920';
        $media->height = '1080';
        $media->hash = '01233456789abcdefghijklmnopqrstuvwxyz';
        $media->save();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
