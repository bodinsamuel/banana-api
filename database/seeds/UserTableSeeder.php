<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Media;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $media = new Media();
        $media->user_id = 1;
        $media->type = 'image';
        $media->mime = 'image/jpeg';
        $media->width = '500';
        $media->height = '500';
        $media->hash = '01233456789abcdefghijklmnopqrstuvwxyz';
        $media->save();

        DB::table('users')->truncate();

        $user = new User();
        $user->login = 'root';
        $user->email = 'root@example.com';
        $user->first_name = 'Samuel';
        $user->last_name = 'Bodin';
        $user->password = bcrypt('secret');
        $user->media_id = $media->media_id;
        $user->save();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
