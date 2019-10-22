<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcademicSubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("

            INSERT INTO `academic_subjects` (`id`, `title`, `code_name`) VALUES
            ('1', 'English', 'ENG'),
            ('2', 'Mathematics', 'MTH'),
            ('3', 'Social Studies', 'SCS'),
            ('4', 'Home Economics', 'HEC'),
            ('5', 'Integrated Science', 'ITG'),
            ('6', 'Biology', 'BIO'),
            ('7', 'Economics', 'ECO'),
            ('8', 'Literature', 'LIT');
        ");
    }
}
