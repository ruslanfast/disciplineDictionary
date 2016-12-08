<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'name' => 'Кафедра технічної кібернетики',
            'faculty_id' => 1
        ]);

        DB::table('departments')->insert([
            'name' => 'Кафедра автоматики i управлiння в технiчних системах',
            'faculty_id' => 1
        ]);
    }
}
