<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Руслан",
            'email' => 'merspower@gmail.com',
            'password'=> bcrypt('qwerty'),
            'faculty_id' => 1,
            'permission_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => "Руслан",
            'email' => 'ruslanfast11@gmail.com',
            'password'=> bcrypt('qwerty'),
            'faculty_id' => 1,
            'permission_id' => 1
        ]);
    }
}
