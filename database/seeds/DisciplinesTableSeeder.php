<?php

use Illuminate\Database\Seeder;

class DisciplinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disciplines')->insert([
            'name' => "Вища математика-2",
            'academic_time'=> 106,
            'user_id' => 1,
            'department_id'=> 1
        ]);

        DB::table('disciplines')->insert([
            'name' => "Вища математика-1",
            'academic_time'=> 106,
            'user_id' => 2,
            'department_id'=> 2
        ]);
    }
}
