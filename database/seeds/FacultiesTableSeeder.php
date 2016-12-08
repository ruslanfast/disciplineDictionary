<?php

use Illuminate\Database\Seeder;

class FacultiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faculties')->insert([
           'name' => "Факультет інформатики та обчислювальної техніки"
        ]);

        DB::table('faculties')->insert([
            'name' => "Факультет електроніки"
        ]);
    }
}
