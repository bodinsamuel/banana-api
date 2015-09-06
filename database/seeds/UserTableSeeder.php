<?php

use Illuminate\Database\Seeder;

use App\User;

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

        DB::table('users')->truncate();

        $user = new User();
        $user->login = 'root';
        $user->email = 'root@example.com';
        $user->password = bcrypt('secret');
        $user->save();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
